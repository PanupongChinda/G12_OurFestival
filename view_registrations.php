<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered List | Hall-o'-ween Party</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="Homepage.html">🎃 Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.html">Back to Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <h2 class="text-warning text-center mb-4">รายชื่อผู้ลงทะเบียน (Registered Users)</h2>
        
        <div class="card custom-card p-4">
            <div class="table-responsive">
                <table class="table table-dark table-hover border-warning">
                    <thead>
                        <tr class="text-warning">
                            <th>#</th>
                            <th>เวลาที่ลงทะเบียน</th>
                            <th>ชื่อ-สกุล</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทร</th>
                            <th>ประเภทตั๋ว</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $file = 'data/registrations.json';
                        if (file_exists($file)) {
                            $data = json_decode(file_get_contents($file), true);
                            // กลับลำดับให้คนล่าสุดขึ้นก่อน
                            $data = array_reverse($data); 
                            
                            foreach ($data as $index => $row) {
                                echo "<tr>";
                                echo "<td>" . ($index + 1) . "</td>";
                                echo "<td>" . $row['timestamp'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                
                                // จัดสี Badge ตามประเภทตั๋ว
                                $badgeColor = 'bg-secondary';
                                if($row['ticket'] == 'vip_conjuring') $badgeColor = 'bg-danger';
                                if($row['ticket'] == 'vip_witch') $badgeColor = 'bg-purple'; // ต้องไปเพิ่ม class bg-purple หรือใช้ style inline
                                
                                echo "<td><span class='badge $badgeColor'>" . $row['ticket'] . "</span></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>ยังไม่มีข้อมูลการลงทะเบียน</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>