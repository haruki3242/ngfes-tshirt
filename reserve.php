<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文化祭Tシャツ　Web受け付け</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="./new.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <style>
    .slide img {
      width: 100%;
    }
  </style>

<body>
  <div class="form-wrapper">
    <h1>文化祭Tシャツ<p><br>Web受け付け</h1>

    <!-- 予約フォームのコード -->
    <form action="confirm.php" method="POST">
      <div class="form-item">
        <label for="student-number">学籍番号</label>
        <input type="number" name="student-number" min="111111" max="999999" oninput="javascript: this.value = this.value.slice(0,6);" required="required" placeholder="数字6桁　靴箱の番号と同じです">
      </div>
      <div class="form-item">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" required="required" placeholder="example@gmail.com">
      </div>

      <div class="form-item">
        <label for="size">サイズ</label><br>
        <select name="size-select" required>
          <option value="" disabled selected>サイズを選択してください</option>
          <option>S</option>
          <option>M</option>
          <option>L</option>
          <option>XL</option>
          <option>XXL</option>
        </select>
      </div>
      <div class="form-item">
        <label for"count">枚数</label><br>
      <select id="count-select" name="count-select" onchange="updateColorOptions()" required>
        <option value="" disabled selected>枚数を選択してください</option>
        <option value="1" selected>1枚</option>
        <option value="2">2枚</option>
        <option value="3">3枚</option>
        <option value="4">4枚</option>
        <option value="5">5枚</option>
      </select>
    </div>
    <div class="form-item">
<div id="color-options">
        <!-- カラーオプションはJavaScriptで動的に生成されます -->
      </div>
    </div>

<div class="form-item">
<label>カラーバリエーション（画像はイメージです）</label> </br>
  <div class="slide-items__wrap">
    <ul class="slide-items">
      <li class="slide-items__item">
        <img src="image1_1.jpg" alt=ホワイト×グリーン　前面">
        <p>ホワイト×グリーン　前面</p>
      </li>
      <li class="slide-items__item">
        <img src="image1_2.jpg" alt="ホワイト×グリーン　背面">
        <p>ホワイト×グリーン　背面</p>
      </li>
      <li class="slide-items__item">
        <img src="image2_1.jpg" alt="ベビーピンク×ホットピンク　前面">
        <p>ベビーピンク×ホットピンク　前面</p>
      </li>
      <li class="slide-items__item">
        <img src="image2_2.jpg" alt="ベビーピンク×ホットピンク　背面">
        <p>ベビーピンク×ホットピンク　背面</p>
      </li>
      <li class="slide-items__item">
        <img src="image3_1.jpg" alt="ライトブルー×バイオレット　前面">
        <p>ライトブルー×バイオレット　前面</p>
      </li>
      <li class="slide-items__item">
        <img src="image3_2.jpg" alt="ライトブルー×バイオレット　背面">
        <p>ライトブルー×バイオレット　背面</p>
      </li>
      <li class="slide-items__item">
        <img src="image4_1.jpg" alt="ロイヤルブルー×イエロー　前面">
        <p>ロイヤルブルー×イエロー　前面</p>
      </li>
      <li class="slide-items__item">
        <img src="image4_2.jpg" alt="ロイヤルブルー×イエロー　背面">
        <p>ロイヤルブルー×イエロー　背面</p>
      </li>
      <li class="slide-items__item">
        <img src="image5_1.jpg" alt="ブラック×ホットピンク　前面">
        <p>ブラック×ホットピンク　前面</p>
      </li>
      <li class="slide-items__item">
        <img src="image5_2.jpg" alt="ブラック×ホットピンク　背面">
        <p>ブラック×ホットピンク　背面</p>
      </li>
    </ul>
  </div>
  <script>
$(document).ready(function () {
  $('.slide-items').bxSlider();
  captions: true
});

  </script>
</div>

    <?php if (isset($error)) : ?>
      <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <div class="button-panel">
      <input type="submit" class="button" title="Step2" value="STEP2（入力情報の確認）に進む"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="./search.php">予約内容の確認・変更はこちらから</a></p><br><p></p>
    <p>&copy; 奈良学園中学校・高等学校 文化祭実行委員会</p>
  </div>
    
    <!-- 予約フォームのコード -->
    <form action="confirm.php" method="POST">
      <!-- 予約フォームの内容 -->
    </form>
  </div>
  </div>
</div>
<script>
  // フォームが読み込まれたときに初期のカラーオプションを生成する
  window.onload = function() {
    updateColorOptions();
  };

  function updateColorOptions() {
    var countSelect = document.getElementById('count-select');
    var selectedCount = countSelect.value;
    var colorOptionsDiv = document.getElementById('color-options');
    colorOptionsDiv.innerHTML = '';

    if (selectedCount !== '') {
      for (var i = 1; i <= selectedCount; i++) {
        var label = document.createElement('label');
        if (selectedCount === '1') {
          label.textContent = 'カラー';
        } else {
          label.textContent = i + '枚目のカラー';
        }
        colorOptionsDiv.appendChild(label);

        colorOptionsDiv.appendChild(document.createElement('br'));

        var select = document.createElement('select');
        select.name = 'color' + i;
        select.required = true;
        select.onchange = function() {
          updateSampleImage(this);
        };

        var option1 = document.createElement('option');
        option1.value = '';
        option1.disabled = true;
        option1.selected = true;
        option1.textContent = 'カラーを選択してください';
        select.appendChild(option1);

        var option2 = document.createElement('option');
        option2.value = 'a';
        option2.textContent = 'ホワイト';
        select.appendChild(option2);

        var option3 = document.createElement('option');
        option3.value = 'b';
        option3.textContent = 'ベビーピンク';
        select.appendChild(option3);

        var option4 = document.createElement('option');
        option4.value = 'c';
        option4.textContent = 'ライトブルー';
        select.appendChild(option4);

        var option5 = document.createElement('option');
        option5.value = 'd';
        option5.textContent = 'ロイヤルブルー';
        select.appendChild(option5);

        var option6 = document.createElement('option');
        option6.value = 'e';
        option6.textContent = 'ブラック';
        select.appendChild(option6);

        colorOptionsDiv.appendChild(select);

        colorOptionsDiv.appendChild(document.createElement('br'));
      }
    }
  }

  function updateSampleImage(select) {
    var index = select.name.slice(-1);
    var image = document.getElementById('sample-image' + index);

    if (select.value === 'a') {
      image.src = 'image1_1.jpg';
    } else if (select.value === 'b') {
      image.src = 'image2_1.jpg';
    } else if (select.value === 'c') {
      image.src = 'image3_1.jpg';
    } else if (select.value === 'd') {
      image.src = 'image4_1.jpg';
    } else if (select.value === 'e') {
      image.src = 'image5_1.jpg';
    } else {
      image.src = '';
    }
  }
</script>

<script>
$('.bxslider').bxSlider({
    captions:true
});
</script>

</body>
</html>
