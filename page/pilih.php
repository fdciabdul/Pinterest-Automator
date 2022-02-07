<?php include '../page/head.php'; 

  require('../app/pin/autoload.php'); 


// If account is public you can query Instagram without auth

$email = $_POST['email'];
$userp = $_POST['usernamep'];
$pass = $_POST['password'];


use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();

$bot->auth->login($email, $pass);

$boards = $bot->boards->forUser($userp);

?>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<style>
.select{
	widht:100%;
	}
</style>
<style>
	.w-full{
		display:none;
		}
		</style>
	
	<body class="font-sans antialiased bg-gray-200">
		<div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
			<div class="max-w-4xl mx-auto">
				<div class="overflow-hidden bg-white shadow sm:rounded-lg">
					<div class="px-4 py-5 border-b border-gray-200 sm:px-6">
						<h3 class="text-lg font-medium leading-6 text-gray-900">
							Choose Boards
						</h3>
						<p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
							
						</p>
					</div>
					<form action="../page/aku.php" method="POST">
						
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="username"
									value="<?php echo $_POST['username']; ?>"
                              />
							
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="jumlah"
									value="<?php echo $_POST['jumlah']; ?>"
                  
									/>
							
							<center>
							<div class="inline-block relative w-64">
  <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-7 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="board" style="display:block;">
  
  <option>PIlih Papan</option>
  <?php
 foreach ($boards as $i){
  echo '<option value="'.$i['id'].'" data-thumbnail="'.$i['image']['url'].'">'.$i['name'].'</option>';
 }
 ?> </center>
</select>
							<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
  </div>
</div>
							
							<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="url"
									value="<?php echo $_POST['url']; ?>"
                  
									/>
							
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="usernamep"
									value="<?php echo $userp; ?>"
                  
									/>
							
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="email"
									value="<?php echo $email; ?>"
                  
									/>
							
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="password"
									name="password"
									value="<?php echo $pass ?>"
                  
									/>
							
							<div class="px-4 py-5 sm:px-6">
								<button 
									class="w-full px-4 py-2 leading-5 text-white uppercase bg-indigo-700 rounded-lg focus:outline-none focus:shadow-outline hover:bg-indigo-600"
									type="submit" style="display:block;"
								onclick="update()"> Go </button>
					</form>
					<br>
						<br>
					<div id="Progress_Status"> 
  <div id="myprogressBar"></div> 

</div> 
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://thdoan.github.io/bootstrap-select/js/bootstrap-select.js"></script>
<script>
$(document).ready(function() {
  // Initiate with custom caret icon
  $('select.selectpicker').selectpicker({
    caretIcon: 'glyphicon glyphicon-menu-down'
  });
});
</script>
<script> 
function update() { 

  var element = document.getElementById("myprogressBar");    
  
  var width = 1; 

  var identity = setInterval(scene, 10); 

  function scene() { 

    if (width >= 100) { 

      clearInterval(identity); 

    } else { 

      width++;  

      element.style.width = width + '%';  

    } 

  } 
} 

</script> 