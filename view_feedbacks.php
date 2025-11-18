<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks | Hall-o'-ween Party</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
        <h2 class="text-warning text-center mb-4">ความคิดเห็นจากผู้ร่วมงาน</h2>
        
        <div class="row g-4">
            <?php
            $file = 'data/feedbacks.json';
            if (file_exists($file)) {
                $data = json_decode(file_get_contents($file), true);
                $data = array_reverse($data); // เอาอันใหม่สุดขึ้นก่อน

                foreach ($data as $row) {
                    // สร้างดาวตามคะแนน
                    $stars = str_repeat("⭐", (int)$row['rating']);
                    
                    echo '<div class="col-md-6 col-lg-4">';
                    echo '  <div class="card custom-card p-3 h-100">';
                    echo '      <div class="d-flex justify-content-between mb-2">';
                    echo '          <span class="text-warning fs-5">' . $stars . '</span>';
                    echo '          <small class="text-white-50">' . $row['timestamp'] . '</small>';
                    echo '      </div>';
                    echo '      <p class="text-white">"' . $row['message'] . '"</p>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center text-white">ยังไม่มีความคิดเห็น</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>