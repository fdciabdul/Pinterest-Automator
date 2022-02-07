<?php include 'page/head.php'; ?>

		<div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
			<div class="max-w-4xl mx-auto">
				<div class="overflow-hidden bg-white shadow sm:rounded-lg">
					<div class="px-4 py-5 border-b border-gray-200 sm:px-6">
						<h3 class="text-lg font-medium leading-6 text-gray-900">
							BlOGSPOT TO PINTEREST
						</h3>
						<p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
							Crafted &#10084; You
						</p>
					</div>
					<form method="POST" action="page/pilih2.php">
						
							<div class="px-4 pt-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium leading-5 text-gray-900">
									URL Post Blogspot (* without slash)
								</dt>
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="url"
									placeholder="https://domain.blogspot.com "
									/>
							</div>
							<hr></br>
							<div class="px-4 pt-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium leading-5 text-gray-900">
									Username Pinterest
								</dt>
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="usernamep"
									/>
							</div>
							<div class="px-4 pt-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium leading-5 text-gray-900">
									Email Pinterest
								</dt>
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="text"
									name="email"
									/>
							</div>
							<div class="px-4 pt-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium leading-5 text-gray-900">
									Password Pinterest
								</dt>
								<input
									class="w-full col-span-2 px-3 py-2 mb-2 leading-5 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline bg-gray-300 border-red-500"
									type="password"
									name="password"
									/>
							</div>
							<div class="px-4 py-5 sm:px-6">
								<button 
									class="w-full px-4 py-2 leading-5 text-white uppercase bg-indigo-700 rounded-lg focus:outline-none focus:shadow-outline hover:bg-indigo-600"
									type="submit" 
								> Go </button>
									
					</form>
					<br>
						<br>
					<div id="Progress_Status"> 
  <div id="myprogressBar"></div> 

</div> 
				</div>
				

				
