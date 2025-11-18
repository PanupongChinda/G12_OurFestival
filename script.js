document.addEventListener('DOMContentLoaded', () => {
    // ตรวจสอบ URL Parameter ว่ามี status=success หรือไม่
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('status') === 'success') {
        // ถ้ามี ให้แสดง Alert (ถ้ามี element id="successMessage")
        const message = document.getElementById("successMessage");
        if (message) {
            message.style.display = "block";
            // ลบ parameter ออกจาก URL เพื่อไม่ให้ refresh แล้วขึ้นซ้ำ (Optional)
            window.history.replaceState({}, document.title, window.location.pathname);
        } else {
            // กรณี feedback หรือหน้าที่ไม่มี div message ให้ alert ธรรมดา
            alert("บันทึกข้อมูลสำเร็จ! ขอบคุณที่ร่วมกิจกรรม 🎃");
        }
    }
});