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

ตัวอย่างการ GET all
<img width="846" height="804" alt="image" src="https://github.com/user-attachments/assets/55f6b93b-d71a-417c-8e7a-f4f201398f4b" />

ตัวอย่างการ GET ID
<img width="829" height="699" alt="image" src="https://github.com/user-attachments/assets/6e155c64-a934-4269-b1de-10429f2d6b88" />

ตัวอย่างการ PATCH

Before
<img width="875" height="694" alt="image" src="https://github.com/user-attachments/assets/b0073e11-4015-4b86-8b0b-6ac93503923b" />

<img width="847" height="621" alt="image" src="https://github.com/user-attachments/assets/fdbc0e45-47ff-40ed-bb13-900574c466ec" />

After
<img width="313" height="210" alt="image" src="https://github.com/user-attachments/assets/67dea7e5-76b2-4f7b-938d-2f8889d59f7c" />


ตัวอย่างการ DELETE 
<img width="844" height="595" alt="image" src="https://github.com/user-attachments/assets/bcdd14c4-8e6f-4363-ab8f-5d5b7a9e8a33" />

<img width="854" height="600" alt="image" src="https://github.com/user-attachments/assets/c5b97b31-03b6-4e63-9d5c-c416bfda485f" />

