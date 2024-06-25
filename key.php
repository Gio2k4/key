<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Key</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&display=swap');
    *{
        background-color: black;
        color: white;
        font-family: "Playwrite NZ", cursive;
        text-align: center;
    }
        #time {
            font-size: 1.5em;
            margin-top: 20px;
        }
        #key {
            cursor: pointer;
            color: blue;
            text-decoration: none; /* Loại bỏ gạch chân */
        }
    </style>
</head>
<body>
    <div id="time"></div>
    <h1>
        <?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $key = $_GET["key"];
        echo "Key của bạn là: <span id='key'>" . htmlspecialchars($key) . "</span>";
        ?>
    </h1>
    <h3>Click vào key để coppy</h3>


    <script>
        function updateTime() {
            const now = new Date();
            const options = { 
                timeZone: 'Asia/Ho_Chi_Minh', 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit' 
            };
            const timeString = now.toLocaleTimeString('vi-VN', options);
            document.getElementById('time').textContent = `Thời gian hiện tại: ${timeString}`;
        }

        setInterval(updateTime, 1000);
        updateTime(); // Cập nhật ngay lập tức khi trang được tải

        document.getElementById('key').addEventListener('click', function() {
            const keyText = this.textContent;
            const tempInput = document.createElement('input');
            tempInput.style.position = 'absolute';
            tempInput.style.left = '-9999px';
            tempInput.value = keyText;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Dành cho các thiết bị di động
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            alert('Key đã được sao chép vào clipboard: ' + keyText);
        });
    </script>
</body>
</html>
