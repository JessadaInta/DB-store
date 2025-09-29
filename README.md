# DB-store
==========การใช้งาน==========
ในฟังก์ชั่นที่ api สามารถทำได้มีดังนี้
GET สามารถดึงข้อมูลทั้งหมดหรือดึงข้อมูลแต่ละตัวโดยสามารถ / หลัง url และใส่ productID ที่ต้องการให้แสดงขึ้นมาได้เลย หากไม่ใส่ตัวเลขก็จะแสดงข้อมูลทั้งหมดออกมาแทน
POST สามารถเพิ่มข้อมูลเข้าไปในฐานข้อมูลโดยเป็นข้อมูลใหม่ แต่ต้องมีโครงสร้างที่ตรงกับฐานข้อมูลที่สร้างไว้และเพิ่มสินค้าใหม่ที่ productID ที่ซ้ำกันไม่ได้
PATCH เป็นการอัพเดตสินค้าโดยการเพิ่มหรือลบผ่าน productID 
DELETE เป้นการลบรายการข้อมูลออกทั้งชุด โดยที่สามารถลบได้ทีละตัวหรือทั้งชุดก็ได้ หากเลือกลบทีละตัวก็เลือกเป็น productID แทน

ตัวอย่างการใช้งานในแต่ละอัน
url [localthost/](http://localhost/api.php/guitar_store) 
หากต้องการ GET all =>> GET http://localhost/api.php/guitar_store
หากต้อการ GET ID = 1 =>> GET http://localhost/api.php/guitar_store/1
หากต้องการ PATCH ID = 21 =>> PATCH http://localhost/api.php/guitar_store/21
{
  "color" : "black" // เปลี่ยนกีตาร์ ID = 21 เป็นสีดำ
}
หากต้องการ DELETE ID = 22 =>> DELETE http://localhost/api.php/guitar_store/22

