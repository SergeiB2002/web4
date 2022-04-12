<style>
#content, header div{
    background-color: rgba(123, 0, 212, 0.1);
    max-width: 960px;
    margin: 0 auto;
}
body{
    font-family: "Montserrat", sans-serif;
}
div.table ,#form, div.link-list{
    background-color: rgba(123, 0, 212, 0.24);
}
form {
  font-family:inherit;
  font-size: inherit;
}
label {
    margin:10px 0;
}
input[type=text] {
  padding:10px;
  margin:10px 0;
  border:1;
    border-radius:15px;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
}
input[type=email] {
  padding:10px;
  margin:10px 0;
  border:1;
    border-radius:15px;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
}
input[type=date] {
  padding:10px;
  margin:10px 0;
  border:1;
    border-radius:15px;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
}
select {
  padding:10px;
  border-radius:10px;
}
textarea {
  resize: vertical;
  padding:15px;
  margin:10px 0;
  border-radius:15px;
  border:1;
  box-shadow:4px 4px 10px rgba(0,0,0,0.06);
  height:150px;
}
.error {
    border: 3px solid red;
  }
<style>
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
