		<?php
		
		echo""
		?>
        <div class="wrap">
			<script src="/wordpress/wp-content/plugins/custom plugin/brands.js"></script>
			<style>
				#Brands_table{
					border-collapse: collapse;
				}
				tr{
					border-left:2px solid black;
					border-right:2px solid black;
				}
				td{
					border-left:2px solid black;
					border-right:2px solid black;		
				
				
				}
			</style>
				<table id="Brands_table">
			</table>
						<script>
									let BrandJsonData = brands;
			console.log(BrandJsonData)

		let table = document.getElementById("Brands_table");
							
							for(const i in BrandJsonData){
								let row = document.createElement("tr")
								if(i <= 0){
									for(j in BrandJsonData[i]){
										
										cell = document.createElement("th");
										cell.innerHTML = j;
										row.appendChild(cell);
									}
										table.appendChild(row)
								 row = document.createElement("tr")
									
								}
									for(j in BrandJsonData[i]){
										let cell;
									
											cell = document.createElement("td");
											cell.innerHTML = BrandJsonData[i][j]											
										
											
									 
								
										console.log(j,BrandJsonData[i][j])
									row.appendChild(cell);
								
									}
								table.appendChild(row)
							}
							
			</script>


        </div>
        