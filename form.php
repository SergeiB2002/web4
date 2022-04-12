<body>
   <div id="form">
    <h1>Форма контракта</h1>

    <form action="index.php" method="POST">

      <label>
        Имя:<br />
        <input type="text" name="field-name"
          value="Ivan" />
      </label><br />

      <label>
        Еmail:<br />
        <input name="field-email"
          value="test@example.com"
          type="email" />
      </label><br />

      <label>
        Год рождения:<br />
        <select id="ddlYears" name="year"></select>
      </label><br />
	  
	  Пол:<br />
      <label><input type="radio" checked="checked"
        name="radio-pol" value="man" />
        Мужской</label>
      <label><input type="radio"
        name="radio-pol" value="woman" />
        Женский</label><br />
		
	  Количество конечностей:<br />
      <label><input type="radio"
        name="radio-limb" value="0" />
        0</label>
      <label><input type="radio"
        name="radio-limb" value="1" />
        1</label>
	  <label><input type="radio"
        name="radio-limb" value="2" />
        2</label>
	  <label><input type="radio"
        name="radio-limb" value="3" />
        3</label>
	  <label><input type="radio" checked="checked"
        name="radio-limb" value="4" />
        4</label><br />
		
	  <label>
        Сверхспособности:
        <br />
        <select name="field-super[]"
          multiple="multiple">
          <option value="immortal">Бессмертие</option>
          <option value="noclip">No clip</option>
          <option value="power" selected="selected">Суперсила</option>
	  <option value="telepat">Телепатия</option>
        </select>
      </label><br />
	  
      <label>
        Биография:<br />
        <textarea name="field-bio">Write something</textarea>
      </label><br />

      Чекбокс:<br />
      <label><input type="checkbox" name="checkbox"/>
        Я болею за Red Bull Racing</label><br />

      Если уверенны в своем ответе нажимайте:
      <input type="submit" value="Send" />
    </form>
	   
    <script type="text/javascript">
        window.onload = function () {
            var ddlYears = document.getElementById("ddlYears");
            var currentYear = (new Date()).getFullYear();
            for (var i = 1950; i <= currentYear; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        };
    </script>   
	   
  </body>
