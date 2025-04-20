<style type="text/css">
	
	.tab-container{
		padding: 5px;
		background-color: #FFFFFFFF;
		margin: 5px;
		color: #222222FF;
	}
	.tab-button-container{
		display: flex;
		flex-wrap: wrap;

	}
	.tab-button{
		min-width: 100px;
		height: 40px;
		background-color: #eee;
		display: flex;
		justify-content: center;
		align-items: center;
		border: solid thin #ddd;
		cursor: pointer;
		border-top-left-radius:5px;
		border-top-right-radius:5px;
		transition: all 0.3s ease;
		padding: 5px;
	}
	.tab-button:hover{
		background-color: #444;
		color: #FFFFFF;
	}
	
	.tab-pane{
		margin-top: 5px;
		margin-bottom: 5px;
		border: solid thin #eee;
		padding: 5px;
	}
	.tab-pane-content{
		padding: 5px;
	}
	.tab-active{
		background-color: #458DEEFF;
		color: #FFFFFF;
		border: none;
	}
</style>
<div handle="true" role="tab-container" class="tab-container">
	<div class="tab-button-container">
		<div editable="true" class="tab-button tab-active" active-class="tab-active" role="tab" activates="pane1" active="true">Tab1</div>
		<div editable="true" class="tab-button" active-class="tab-active" role="tab" activates="pane2" active="false">Tab2</div>
	</div>
	<div class="pane-container">
		<div id="pane1" class="tab-pane" role="tab-pane">
			<div editable="true" class="tab-pane-content">
				Pane1 contents<br><br>

				What is Lorem Ipsum?<br><br>

				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum

			</div>
		</div>
		<div id="pane2" class="tab-pane" role="tab-pane">
			<div editable="true" class="tab-pane-content">
				Pane2 contents<br><br>

				Why do we use it?<br><br>

				It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy

			</div>
		</div>
		
	</div>
</div>
