<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root"; 
$pass = "";         
$db   = "storeapi";  

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

$request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$scriptName = basename($_SERVER['SCRIPT_NAME']); 
$key = array_search($scriptName, $request);
$endpoint = array_slice($request, $key + 1);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        if (count($endpoint) == 1 && $endpoint[0] === "guitar_store") {
            $sql = "SELECT * FROM guitar_store";
            $result = $conn->query($sql);
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } elseif (count($endpoint) == 2 && $endpoint[0] === "guitar_store") {
            $id = intval($endpoint[1]);
            $stmt = $conn->prepare("SELECT * FROM guitar_store WHERE productID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row) {
                echo json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Product not found"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Bad request"]);
        }
        break;

    case "POST":
        if (count($endpoint) == 1 && $endpoint[0] === "guitar_store") {
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(["error" => "Invalid JSON"]);
                exit;
            }

            $stmt = $conn->prepare("INSERT INTO guitar_store (productID, brand, type, color, pickup, string, frets) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "issssii",
                $data["productID"],
                $data["brand"],
                $data["type"],
                $data["color"],
                $data["pickup"],
                $data["string"],
                $data["frets"]
            );

            if ($stmt->execute()) {
                http_response_code(201);
                echo json_encode(["status" => "success", "message" => "Product added"]);
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => $stmt->error]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Bad request"]);
        }
        break;

           case "PATCH":
        if (count($endpoint) == 2 && $endpoint[0] === "guitar_store") {
            $id = intval($endpoint[1]);
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(["error" => "Invalid JSON"]);
                exit;
            }

            $allowedFields = ["brand", "type", "color", "pickup", "string", "frets"];
            $fields = [];
            $params = [];
            $types = "";

            foreach ($allowedFields as $field) {
                if (isset($data[$field])) {
                    $fields[] = "$field = ?";
                    $params[] = $data[$field];
                    $types .= is_int($data[$field]) ? "i" : "s";
                }
            }

            if (empty($fields)) {
                http_response_code(400);
                echo json_encode(["error" => "No valid fields to update"]);
                exit;
            }

            $params[] = $id;
            $types .= "i";

            $sql = "UPDATE guitar_store SET " . implode(", ", $fields) . " WHERE productID = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                http_response_code(500);
                echo json_encode(["error" => "Failed to prepare statement"]);
                exit;
            }

            $bind_names[] = $types;
            for ($i = 0; $i < count($params); $i++) {
                $bind_names[] = &$params[$i]; 
            }

            call_user_func_array([$stmt, 'bind_param'], $bind_names);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo json_encode(["status" => "success", "message" => "Product updated"]);
                } else {
                    http_response_code(404);
                    echo json_encode(["error" => "Product not found or no changes made"]);
                }
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => $stmt->error]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Bad request"]);
        }
        break;


    case "DELETE":
        if (count($endpoint) == 2 && $endpoint[0] === "guitar_store") {
            $id = intval($endpoint[1]);
            $stmt = $conn->prepare("DELETE FROM guitar_store WHERE productID=?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Product deleted"]);
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => $stmt->error]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Bad request"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
}
