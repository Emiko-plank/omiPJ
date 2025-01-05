<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おみくじ</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; /* レスポンシブ対応 */
            width: 90%; /* レスポンシブ対応 */
        }
        #result{
            margin-top: 20px;
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>おみくじ</h1>
        <button id="omikujiButton">おみくじを引く</button>
        <div id="result">
            <?php
            if (isset($_POST['draw'])) {
                $omikuji = [
                    "大吉" => 10,
                    "中吉" => 20,
                    "小吉" => 30,
                    "吉" => 25,
                    "末吉" => 10,
                    "凶" => 4,
                    "大凶" => 1
                ];

                $total_probability = array_sum($omikuji);
                $random_num = rand(1, $total_probability);

                $cumulative_probability = 0;
                foreach ($omikuji as $result => $probability) {
                    $cumulative_probability += $probability;
                    if ($random_num <= $cumulative_probability) {
                        echo "今日の運勢は「" . $result . "」です！";
                        break;
                    }
                }
            }
            ?>
        </div>
    </div>
    <script>
        const button = document.getElementById('omikujiButton');
        const resultDiv = document.getElementById('result');

        button.addEventListener('click', () => {
          //結果表示領域を空にする
          resultDiv.textContent = "";
            const form = document.createElement('form');
            form.method = 'post';
            form.innerHTML = '<input type="hidden" name="draw" value="1">';
            document.body.appendChild(form);
            form.submit();
        });
    </script>
</body>
</html>