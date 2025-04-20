
<div id="item_properties" class="quickcode-hide" onmouseup="DATA.DIRTY_DATA = true" onchange="DATA.DIRTY_DATA = true" onselectstart="return false">
	<div style="font-size:14px!important;background-color: #333a44;color: #8095a0; cursor: move;user-select: none;" onmousedown="properties.set_mouse_down(event)" onmouseup="mouse.set_mouse_up(event)">
		<div style="padding:10px">
			<div style="font-weight: bold;font-size:16px;padding-bottom:5px;margin-bottom:5px;border-bottom: solid thin grey;">Properties 
			  - <small class="quickcode-item_count">0 items selected</small>
			  <button style="float:right;cursor: pointer;margin-left: 4px;border:none;padding: 4px 10px;" onclick="document.querySelector('.quickcode-js-allow_properties').checked = false;actions.allow_properties(false)">x</button>
			  <button style="float:right;cursor: pointer;margin-left: 4px;border:none;padding: 4px 10px;" onclick="properties.collapseAll()">^</button>
			</div>
			<div class="quickcode-item_types"></div>
			<style>
				.quickcode-item_classes > button{
					cursor: pointer;
				}
				.quickcode-item_classes .quickcode-text-input-holder{
					background-color: white;
					padding: 4px;
					position: absolute;
					width: 90%;
					display: flex;
					left: 0px;
					z-index: 1;
				}
				.quickcode-item_classes .quickcode-text-input-holder > button{
					width: 80px;
					cursor: pointer;
				}
				.quickcode-item_classes .quickcode-new-pseudo-class-holder{
					background-color: white;
					padding: 4px;
					position: absolute;
					width: 90%;
					display: flex;
					left: 0px;
					z-index: 1;
				}

				.quickcode-item_classes .quickcode-new-combo-class-holder{
					background-color: white;
					padding: 4px;
					position: absolute;
					width: 90%;
					left: 0px;
					z-index: 1;
				}
				
				.quickcode-item_classes .quickcode-new-text-input-holder{
					background-color: white;
					padding: 4px;
					position: absolute;
					width: 90%;
					display: flex;
					left: 0px;
					z-index: 1;
				}
				
				.quickcode-item_classes .quickcode-new-text-input-holder > button{
					width: 80px;
					cursor: pointer;
				}

				.quickcode-item_classes .quickcode-new-pseudo-class-holder > button{
					width: 80px;
					cursor: pointer;
				}
				
				.quickcode-item_classes .quickcode-d-none{
					display: none!important;
				}
				.quickcode-item_classes .quickcode-muted{
					background-color: #ccc!important;
				}
				
			</style>

		</div>
	</div>
	<div class="quickcode-property_details" oninput="actions.set_property(event.target)" onfocusin="actions.set_temp_undo(event.target)" onfocusout="actions.save_temp_undo(event.target)" onchange="properties.load()" style="overflow-y: auto;padding-bottom: 100px;">
			
		<div class="quickcode-property-title">
				<div class="quickcode-item_classes main-classes-pills"></div>
		</div>
		<div class="quickcode-property-title">
			<div style="display: flex;justify-content: space-between;" onclick="this.parentNode.querySelector('.quickcode-classes-holder').classList.toggle('quickcode-hide')">
				<div>Pseudo & Combined classes</div>
				<div><button style="width:25px;cursor: pointer;">v</button></div>
			</div>
			<div class="quickcode-classes-holder quickcode-hide">
				<div class="quickcode-item_classes sudo-classes-pills"></div>
			</div>
		</div>

		<div style="display: flex;">
			<div style="max-width:180px" class="quickcode-property-group" property="color" propertyAppend="" propertyType="style"  propertyPrepend="">
				<div class="quickcode-input-group">
					<div class="quickcode-w-50"><b>Color:</b></div>
					<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="#000000FF" data-jscolor="{}">
					<button onclick="actions.remove_property('color')">x</button>
				</div>
			</div>
			<div class="quickcode-property-group quickcode-border-left" property="background-color" propertyAppend="" propertyType="style" propertyPrepend="">
				<div class="quickcode-input-group">
					<div><b>Bg Color:</b></div>
					<input style="max-width:110px" class="quickcode-form-control quickcode-w-50 quickcode-data-source" value="#FFFFFFFF" data-jscolor="{}">
					<button onclick="actions.remove_property('background-color')">x</button>
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Font</div>
			<div class="quickcode-property-holder quickcode-hide">
				<div style="display: flex;">
					<div style="flex:1.2" class="quickcode-property-group" property="font-size" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Font Size:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" min="1" name="font-size" value="14" />
								<button onclick="actions.remove_property('font-size')">x</button>
							</div>					
							<div>
								<label><input type="radio" class="quickcode-font-sizeAppendType" name="font-sizeAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-font-sizeAppendType" name="font-sizeAppendType" value="em" /> em</label>
								<label><input type="radio" class="quickcode-font-sizeAppendType" name="font-sizeAppendType" value="rem" /> rem</label>
							</div>			
						</div>
					</div>

					<div style="flex:1" class="quickcode-property-group" property="text-align" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Text Align:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="text-align">
								<option value="left">Left</option>
								<option value="center">Center</option>
								<option value="right">Right</option>
							</select>
							<button onclick="actions.remove_property('text-align')">x</button>
						</div>
					</div>
					
				</div>

				<div style="display: flex;">

					<div style="flex:1" class="quickcode-property-group" property="font-style" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Font Style:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="font-style">
								<option value="normal">Normal</option>
								<option value="italic">Italic</option>
								<option value="oblique">Oblique</option>
							</select>
							<button onclick="actions.remove_property('font-style')">x</button>
						</div>
					</div>

					<div style="flex:1" class="quickcode-property-group" property="font-family" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Font Family:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="font-family">
								<option value="opensans">Open Sans</option>
								<option value="segoe">Segoe</option>
								<option value="segoebold">Segoe Bold</option>
								<option value="dancingscript">Dancing Script</option>
								<option value="amatic">Amatic</option>
								<option value="specialelite">Special Elite</option>
								<option value="yellowtail">Yellow Tail</option>
								<option value="impact">Impact</option>
								<option value="tahoma">Tahoma</option>
								<option value="poppins">Poppins</option>
								<option value="fira">Fira Sans</option>
								<option value="montserrat">Montserrat</option>
								<option value="shantell">Shantell Sans</option>
								<option value="shadows-into-light">Shadows Into Light</option>
								<option value="mynerve">Mynerve</option>
								<option value="bodoni">Bodoni MT</option>
							</select>
							<button onclick="actions.remove_property('font-family')">x</button>
						</div>
					</div>
					
				</div>
					
				<div style="display: flex;">
					<div style="flex:1" class="quickcode-property-group" property="font-weight" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Font Weight:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="font-weight">
								<option value="normal">Normal</option>
								<option value="bold">Bold</option>
							</select>
							<button onclick="actions.remove_property('font-weight')">x</button>
						</div>
					</div>
					<div style="flex:1" class="quickcode-property-group" property="letter-spacing" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Letter Spacing:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" min="1" name="letter-spacing" value="0" />
								<button onclick="actions.remove_property('letter-spacing')">x</button>
							</div>					
							<div>
								<label><input type="radio" class="quickcode-letter-spacingAppendType" name="letter-spacingAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-letter-spacingAppendType" name="letter-spacingAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Width</div>
			<div class="quickcode-property-holder quickcode-hide">
				
				<div class="quickcode-property-group" property="width" propertyAppend="px" propertyType="style" propertyPrepend="">
					<div><b>Width:</b></div>
					<div class="quickcode-input-group">
						<div style="display:flex;">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="width" value="0" />
							<button onclick="actions.remove_property('width')">x</button>
						</div>
						<div>
							<label><input type="radio" class="quickcode-widthAppendType" name="widthAppendType" value="px" checked /> px</label>
							<label><input type="radio" class="quickcode-widthAppendType" name="widthAppendType" value="%" /> %</label>
							<label><input type="radio" class="quickcode-widthAppendType" name="widthAppendType" value="vw" /> vw</label>
						</div>
					</div>
				</div>
				
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-border-left" property="max-width" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Max Width:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="max-width" value="0" />
								<button onclick="actions.remove_property('max-width')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-max-widthAppendType" name="max-widthAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-max-widthAppendType" name="max-widthAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-border-left" property="min-width" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Min Width:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="min-width" value="0" />
								<button onclick="actions.remove_property('min-width')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-min-widthAppendType" name="min-widthAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-min-widthAppendType" name="min-widthAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Height</div>
			<div class="quickcode-property-holder quickcode-hide">
			
				<div class="quickcode-property-group" property="height" propertyAppend="px" propertyType="style" propertyPrepend="">
					<div><b>Height:</b></div>
					<div class="quickcode-input-group">
						<div style="display:flex;">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="height" value="0" />
							<button onclick="actions.remove_property('height')">x</button>
						</div>
						<div>
							<label><input type="radio" class="quickcode-heightAppendType" name="heightAppendType" value="px" checked /> px</label>
							<label><input type="radio" class="quickcode-heightAppendType" name="heightAppendType" value="%" /> %</label>
							<label><input type="radio" class="quickcode-heightAppendType" name="heightAppendType" value="vh" /> vh</label>
						</div>
					</div>
				</div>
					
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-border-left" property="max-height" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Max Height:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="max-height" value="0" />
								<button onclick="actions.remove_property('max-height')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-max-heightAppendType" name="max-heightAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-max-heightAppendType" name="max-heightAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>

					<div class="quickcode-property-group quickcode-border-left" property="min-height" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Min Height:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="min-height" value="0" />
								<button onclick="actions.remove_property('min-height')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-min-heightAppendType" name="min-heightAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-min-heightAppendType" name="min-heightAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Margin</div>
			<div class="quickcode-property-holder quickcode-hide">
				
				<div class="quickcode-property-group" property="margin" propertyAppend="px" propertyType="style" propertyPrepend="">
					<div><b>Margin:</b></div>
					<div class="quickcode-input-group">
						<div style="display:flex;">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="margin" value="0" />
							<button onclick="actions.remove_property('margin')">x</button>
						</div>
						<div>
							<label><input type="radio" class="quickcode-marginAppendType" name="marginAppendType" value="px" checked /> px</label>
							<label><input type="radio" class="quickcode-marginAppendType" name="marginAppendType" value="em" /> em</label>
						</div>			
					</div>
				</div>
				<div class="quickcode-property-group" property="margin" usePropertyAppend="false" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display:flex;"><b>Auto:</b> <input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="checkbox" name="margin" value="auto" /></div>
				</div>

				<div style="display: flex;">
					<div class="quickcode-property-group" property="margin-left" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Margin Left:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="margin-left" value="0" />
								<button onclick="actions.remove_property('margin-left')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-margin-leftAppendType" name="margin-leftAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-margin-leftAppendType" name="margin-leftAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="margin-right" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Margin Right:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="margin-right" value="0" />
								<button onclick="actions.remove_property('margin-right')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-margin-rightAppendType" name="margin-rightAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-margin-rightAppendType" name="margin-rightAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group" property="margin-top" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Margin Top:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="margin-top" value="0" />
								<button onclick="actions.remove_property('margin-top')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-margin-topAppendType" name="margin-topAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-margin-topAppendType" name="margin-topAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="margin-bottom" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Margin Bottom:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="margin-bottom" value="0" />
								<button onclick="actions.remove_property('margin-bottom')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-margin-bottomAppendType" name="margin-bottomAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-margin-bottomAppendType" name="margin-bottomAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Border</div>
			<div class="quickcode-property-holder quickcode-hide">
				<div class="quickcode-property-group quickcode-w-100" property="border" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display: flex;">
						<div style="flex:1">
							<div><b>Border Type:</b></div>
							<select oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_type quickcode-w-100" name="border">
								<option value="solid">Solid</option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
							</select>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" type="hidden" name="border" value="" max="4998" />
						</div>
						<div style="flex:1" class="quickcode-">
							<div><b>Border Size:</b></div>
							<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_size quickcode-w-100" type="number" name="" min="1" value="1" />
						</div>	
					</div>	
					<div class="quickcode-input-group">
						<div class="quickcode-w-50"><b>Border Color:</b></div>
						<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_color quickcode-w-100" value="#000000FF" data-jscolor="{}">
						<button onclick="actions.remove_property('border')">x</button>
					</div>

				</div>
				<div class="quickcode-property-group" property="border" usePropertyAppend="false" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display:flex;"><b style="flex:1">None:</b> <input style="flex: 4;transform: scale(1.5);" class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="checkbox" name="border" value="none" /></div>
				</div>

				<div><small><b>Border Top:</b></small></div>
				<div class="quickcode-property-group quickcode-w-100" property="border-top" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display: flex;">
						<div style="flex:1">
							<div><b>Border Type:</b></div>
							<select oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_type quickcode-w-100" name="border-top">
								<option value="solid">Solid</option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
							</select>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" type="hidden" name="border-top" value="" max="4998" />
						</div>
						<div style="flex:1" class="quickcode-">
							<div><b>Border Size:</b></div>
							<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_size quickcode-w-100" type="number" name="" min="1" value="1" />
						</div>	
					</div>	
					<div class="quickcode-input-group">
						<div class="quickcode-w-50"><b>Border Color:</b></div>
						<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_color quickcode-w-100" value="#000000FF" data-jscolor="{}">
						<button onclick="actions.remove_property('border-top')">x</button>
					</div>
				</div>

				<div><small><b>Border Left:</b></small></div>
				<div class="quickcode-property-group quickcode-w-100" property="border-left" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display: flex;">
						<div style="flex:1">
							<div><b>Border Type:</b></div>
							<select oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_type quickcode-w-100" name="border-left">
								<option value="solid">Solid</option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
							</select>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" type="hidden" name="border-left" value="" max="4998" />
						</div>
						
						<div style="flex:1" class="quickcode-">
							<div><b>Border Size:</b></div>
							<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_size quickcode-w-100" type="number" name="" min="1" value="1" />
						</div>	
					</div>	
					<div class="quickcode-input-group">
						<div class="quickcode-w-50"><b>Border Color:</b></div>
						<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_color quickcode-w-100" value="#000000FF" data-jscolor="{}">
						<button onclick="actions.remove_property('border-left')">x</button>
					</div>
				</div>

				<div><small><b>Border Right:</b></small></div>
				<div class="quickcode-property-group quickcode-w-100" property="border-right" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display: flex;">
						<div style="flex:1">
							<div><b>Border Type:</b></div>
							<select oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_type quickcode-w-100" name="border-right">
								<option value="solid">Solid</option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
							</select>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" type="hidden" name="border-right" value="" max="4998" />
						</div>
						<div style="flex:1" class="quickcode-">
							<div><b>Border Size:</b></div>
							<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_size quickcode-w-100" type="number" name="" min="1" value="1" />
						</div>	
					</div>	
					<div class="quickcode-input-group">
						<div class="quickcode-w-50"><b>Border Color:</b></div>
						<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_color quickcode-w-100" value="#000000FF" data-jscolor="{}">
						<button onclick="actions.remove_property('border-right')">x</button>
					</div>
				</div>

				<div><small><b>Border Bottom:</b></small></div>
				<div class="quickcode-property-group quickcode-w-100" property="border-bottom" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display: flex">
						<div style="flex:1">
							<div><b>Border Type:</b></div>
							<select oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_type quickcode-w-100" name="border-bottom">
								<option value="solid">Solid</option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
							</select>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" type="hidden" name="border-bottom" value="" max="4998" />
						</div>
						<div style="flex:1" class="quickcode-">
							<div><b>Border Size:</b></div>
							<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_size quickcode-w-100" type="number" name="" min="1" value="1" />
						</div>	
					</div>	
					<div class="quickcode-input-group">
						<div class="quickcode-w-50"><b>Border Color:</b></div>
						<input oninput="properties.update_border_input(event)" class="quickcode-form-control quickcode-border_color quickcode-w-100" value="#000000FF" data-jscolor="{}">
						<button onclick="actions.remove_property('border-bottom')">x</button>
					</div>
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Padding</div>
			<div class="quickcode-property-holder quickcode-hide">
				
				<div class="quickcode-property-group" property="padding" propertyAppend="px" propertyType="style" propertyPrepend="">
					<div><b>Padding:</b></div>
					<div class="quickcode-input-group">
						<div style="display:flex;">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="padding" value="0" />
							<button onclick="actions.remove_property('padding')">x</button>
						</div>
						<div>
							<label><input type="radio" class="quickcode-paddingAppendType" name="paddingAppendType" value="px" checked /> px</label>
							<label><input type="radio" class="quickcode-paddingAppendType" name="paddingAppendType" value="em" /> em</label>
						</div>			
					</div>
				</div>

				<div style="display: flex;">
					<div class="quickcode-property-group" property="padding-left" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Padding Left:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="padding-left" value="0" />
								<button onclick="actions.remove_property('padding-left')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-padding-leftAppendType" name="padding-leftAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-padding-leftAppendType" name="padding-leftAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="padding-right" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Padding Right:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="padding-right" value="0" />
								<button onclick="actions.remove_property('padding-right')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-padding-rightAppendType" name="padding-rightAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-padding-rightAppendType" name="padding-rightAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group" property="padding-top" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Padding Top:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="padding-top" value="0" />
								<button onclick="actions.remove_property('padding-top')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-padding-topAppendType" name="padding-topAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-padding-topAppendType" name="padding-topAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="padding-bottom" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Padding Bottom:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="padding-bottom" value="0" />
								<button onclick="actions.remove_property('padding-bottom')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-padding-bottomAppendType" name="padding-bottomAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-padding-bottomAppendType" name="padding-bottomAppendType" value="em" /> em</label>
							</div>			
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Box Shadow</div>
			<div class="quickcode-property-holder quickcode-hide">
				<div class="quickcode-property-group quickcode-w-100" usePropertyAppend="false" property="box-shadow" propertyAppend="" propertyType="style" propertyPrepend="">
					<div style="display: flex;">

						<div style="flex:1" class="quickcode-">
							<div><b>x:</b></div>
							<input oninput="properties.update_shadow_input(event)" class="quickcode-form-control quickcode-shadow_x quickcode-w-100" type="number" name="" value="1" />
						</div>
						<div style="flex:1" class="quickcode-">
							<div><b>y:</b></div>
							<input oninput="properties.update_shadow_input(event)" class="quickcode-form-control quickcode-shadow_y quickcode-w-100" type="number" name="" value="1" />
						</div>
						<div style="flex:1" class="quickcode-">
							<div><b>Blur:</b></div>
							<input oninput="properties.update_shadow_input(event)" class="quickcode-form-control quickcode-shadow_blur quickcode-w-100" type="number" name="" min="1" value="1" />
						</div>	
					</div>	
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" type="hidden" name="shadow" value="" max="4998" />
					<div class="quickcode-input-group">
						<div class="quickcode-w-50"><b>Shadow Color:</b></div>
						<input oninput="properties.update_shadow_input(event)" class="quickcode-form-control quickcode-shadow_color quickcode-w-100" value="#000000FF" data-jscolor="{}">
						<button onclick="actions.remove_property('box-shadow')">x</button>
					</div>

				</div>

			</div>
		</div>
		
		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Border Radius</div>
			<div class="quickcode-property-holder quickcode-hide">
				
				<div class="quickcode-property-group" property="border-radius" propertyAppend="px" propertyType="style" propertyPrepend="">
					<div><b>Border Radius:</b></div>
					<div class="quickcode-input-group">
						<div style="display:flex;">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="border-radius" value="0" />
							<button onclick="actions.remove_property('border-radius')">x</button>
						</div>
						<div>
							<label><input type="radio" class="quickcode-border-radiusAppendType" name="border-radiusAppendType" value="px" checked /> px</label>
							<label><input type="radio" class="quickcode-border-radiusAppendType" name="border-radiusAppendType" value="%" /> %</label>
						</div>			
					</div>
				</div>

				<div style="display: flex;">
					<div class="quickcode-property-group" property="border-top-left-radius" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Radius Top Left:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="border-top-left-radius" value="0" />
								<button onclick="actions.remove_property('border-top-left-radius')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-border-top-left-radiusAppendType" name="border-top-left-radiusAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-border-top-left-radiusAppendType" name="border-top-left-radiusAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="border-top-right-radius" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Radius Top Right:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="border-top-right-radius" value="0" />
								<button onclick="actions.remove_property('border-top-right-radius')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-border-top-right-radiusAppendType" name="border-top-right-radiusAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-border-top-right-radiusAppendType" name="border-top-right-radiusAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group" property="border-bottom-left-radius" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Radius Bottom Left:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="border-bottom-left-radius" value="0" />
								<button onclick="actions.remove_property('border-bottom-left-radius')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-border-bottom-left-radiusAppendType" name="border-bottom-left-radiusAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-border-bottom-left-radiusAppendType" name="border-bottom-left-radiusAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="border-bottom-right-radius" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Radius Bottom Right:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="border-bottom-right-radius" value="0" />
								<button onclick="actions.remove_property('border-bottom-right-radius')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-border-bottom-right-radiusAppendType" name="border-bottom-right-radiusAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-border-bottom-right-radiusAppendType" name="border-bottom-right-radiusAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Position, z-index, Top, Left</div>
			<div class="quickcode-property-holder quickcode-hide">
  
		 		<div style="display: flex;">
					<div style="flex:1" class="quickcode-property-group quickcode-w-100" property="position" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Position:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="position">
								<option value="static">Static</option>
								<option value="absolute">Absolute</option>
								<option value="relative">Relative</option>
								<option value="fixed">Fixed</option>
								<option value="sticky">Sticky</option>
							</select>
							<button onclick="actions.remove_property('position')">x</button>
						</div>
					</div>
					
					<div style="flex:1" class="quickcode-property-group quickcode-border-left" property="z-index" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Z index:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="z-index" value="0" max="4998" />
							<button onclick="actions.remove_property('z-index')">x</button>
						</div>	
					</div>	
				</div>	

				<div style="display: flex;">
					<div class="quickcode-property-group" property="left" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Left:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="left" value="0" />
								<button onclick="actions.remove_property('left')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-leftAppendType" name="leftAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-leftAppendType" name="leftAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="right" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Right:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="right" value="0" />
								<button onclick="actions.remove_property('right')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-rightAppendType" name="rightAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-rightAppendType" name="rightAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group" property="top" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Top:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="top" value="0" />
								<button onclick="actions.remove_property('top')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-topAppendType" name="topAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-topAppendType" name="topAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
					<div class="quickcode-property-group" property="bottom" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Bottom:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="bottom" value="0" />
								<button onclick="actions.remove_property('bottom')">x</button>
							</div>
							<div>
								<label><input type="radio" class="quickcode-bottomAppendType" name="bottomAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-bottomAppendType" name="bottomAppendType" value="%" /> %</label>
							</div>			
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Display, Float, Overflow, Transform </div>
			<div class="quickcode-property-holder quickcode-hide">
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="display" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Display:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="display">
								<option value="block">Block</option>
								<option value="inline">Inline</option>
								<option value="inline-block">Inline-block</option>
								<option value="inline-flex">Inline-flex</option>
								<option value="flex">Flex</option>
								<option value="none">None</option>
							</select>
							<button onclick="actions.remove_property('display')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="float" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Float:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="float">
								<option value="none">None</option>
								<option value="left">Left</option>
								<option value="right">Right</option>
							</select>
							<button onclick="actions.remove_property('float')">x</button>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="flex-wrap" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Flex Wrap:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="flex-wrap">
								<option value="wrap">Wrap</option>
								<option value="nowrap">No Wrap</option>
								<option value="wrap-reverse">Wrap Reverse</option>
								<option value="initial">Initial</option>
							</select>
							<button onclick="actions.remove_property('flex-wrap')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="flex-direction" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Flex Direction:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="flex-direction">
								<option value="row">Row</option>
								<option value="row-reverse">Row Reverse</option>
								<option value="column">Column</option>
								<option value="column-reverse">Column Reverse</option>
								<option value="initial">Initial</option>
							</select>
							<button onclick="actions.remove_property('flex-direction')">x</button>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="justify-content" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Justify Content:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="justify-content">
								<option value="stretch">Stretch</option>
								<option value="flex-start">Flex Start</option>
								<option value="flex-end">Flex End</option>
								<option value="center">Center</option>
								<option value="space-between">Space Between</option>
								<option value="space-around">Space Around</option>
								<option value="space-evenly">Space Evenly</option>
								<option value="initial">Initial</option>
							</select>
							<button onclick="actions.remove_property('justify-content')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="align-items" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Align Items:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="align-items">
								<option value="stretch">Stretch</option>
								<option value="flex-start">Flex Start</option>
								<option value="flex-end">Flex End</option>
								<option value="center">Center</option>
								<option value="baseline">Baseline</option>
								<option value="initial">Initial</option>
							</select>
							<button onclick="actions.remove_property('align-items')">x</button>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="align-content" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Align Content:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="align-content">
								<option value="stretch">Stretch</option>
								<option value="flex-start">Flex Start</option>
								<option value="flex-end">Flex End</option>
								<option value="center">Center</option>
								<option value="space-between">Space Between</option>
								<option value="space-around">Space Around</option>
							</select>
							<button onclick="actions.remove_property('align-content')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="gap" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Gap:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="bottom" value="0" />
								<button onclick="actions.remove_property('gap')">x</button>
							</div>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="row-gap" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Row Gap:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="bottom" value="0" />
								<button onclick="actions.remove_property('row-gap')">x</button>
							</div>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="column-gap" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Column Gap:</b></div>
						<div class="quickcode-input-group">
							<div style="display:flex;">
								<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="bottom" value="0" />
								<button onclick="actions.remove_property('column-gap')">x</button>
							</div>
						</div>
					</div>
				</div>
				
				<div style="display: flex;">
					<div style="flex:1" class="quickcode-property-group" property="rotate" propertyAppend="deg" propertyType="style" propertyPrepend="">
						<div><b>Rotate:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="rotate" value="0" />
					</div>
					<div style="flex:1" class="quickcode-property-group" property="scale" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Scale:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" min="1" step="0.01" name="scale" value="0" />
					</div>
				</div>

				<div style="display: flex;">
					<div style="flex:1" class="quickcode-property-group" property="translate" propertyAppend="" propertyType="style" propertyPrepend="">
						<div class="quickcode-input-group">
							<div style="width: 150px"><b>TranslateX:</b></div>
							<input oninput="properties.update_translate_input(event)" class="quickcode-form-control quickcode-w-100 quickcode-translate_x" type="number" name="translate" value="0" />
						</div>
						<div class="quickcode-input-group">
							<div style="width: 150px"><b>TranslateY:</b></div>
							<input oninput="properties.update_translate_input(event)" class="quickcode-form-control quickcode-w-100 quickcode-translate_y" type="number" name="translate" value="0" />
						</div>
						<input type="hidden" class="quickcode-form-control quickcode-data-source" name="">
					</div>
					<div style="display: flex;margin:5px">
						<button onclick="actions.remove_property('translate')">x</button>
					</div>
				</div>
				<div style="display: flex;">
					<button style="flex:1" onclick="actions.remove_property('translate');actions.remove_property('rotate');actions.remove_property('scale');actions.remove_property('transform')">Remove all transforms</button>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="overflow-x" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Overflow-x:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="overflow-x">
								<option value="visible">Visible</option>
								<option value="hidden">Hidden</option>
								<option value="scroll">Scroll</option>
								<option value="auto">Auto</option>
							</select>
							<button onclick="actions.remove_property('overflow-x')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="overflow-y" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Overflow-y:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="overflow-y">
								<option value="visible">Visible</option>
								<option value="hidden">Hidden</option>
								<option value="scroll">Scroll</option>
								<option value="auto">Auto</option>
							</select>
							<button onclick="actions.remove_property('overflow-y')">x</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Input</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="type" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Input type:</b></div>
						<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="type">
							<option value="text">Text</option>
							<option value="password">Password</option>
							<option value="email">Email</option>
							<option value="number">Number</option>
							<option value="button">Button</option>
							<option value="range">Range</option>
							<option value="submit">Submit</option>
							<option value="radio">Radio</option>
							<option value="checkbox">Checkbox</option>
							<option value="file">File</option>
							<option value="color">Color</option>
							<option value="date">Date</option>
						</select>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="placeholder" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Placeholder:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" name="placeholder" />
					</div>
				</div>

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="required" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Required:</b></div>
						<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="required">
							<option value="false">False</option>
							<option value="true">True</option>
						</select>
					</div>
<!-- 					<div class="quickcode-property-group quickcode-w-100" property="editable" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Editable:</b></div>
						<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="editable">
							<option value="false">False</option>
							<option value="true">True</option>
						</select>
					</div> -->
					
					<div class="quickcode-property-group quickcode-w-100" property="value" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Value:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" name="value" />
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="checked" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Checked:</b></div>
						<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="checked">
							<option value="">None</option>
							<option value="false">False</option>
							<option value="true">True</option>
						</select>
					</div>

				</div>
				
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="name" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Name:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" name="name" />
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="step" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Step:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" step="0.01" name="step" />
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="min" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Min:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" name="min" />
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="max" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Max:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" name="max" />
					</div>
				</div>
				
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Clear, Cursor</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="clear" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Clear:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="clear">
								<option value="none">None</option>
								<option value="left">Left</option>
								<option value="right">Right</option>
								<option value="both">Both</option>
							</select>
							<button onclick="actions.remove_property('clear')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="cursor" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Cursor:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="cursor">
								<option value="default">Default</option>
								<option value="pointer">Pointer</option>
								<option value="move">Move</option>
								<option value="progress">Progress</option>
								<option value="text">Text</option>
								<option value="wait">Wait</option>
								<option value="copy">Copy</option>
								<option value="no-drop">No Drop</option>
							</select>
							<button onclick="actions.remove_property('cursor')">x</button>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Transition, Text Transform, Flex, Text Decoration</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="transition" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Transition:</b></div>
						<div class="quickcode-input-group">
							<div style="display: flex;flex-direction: column;width: 80px;">
								<small>Time(s):</small>
								<input oninput="properties.update_transition_input(event)" class="quickcode-form-control quickcode-w-100 quickcode-transition_time" value="0" step="0.1" min="0" type="number" />
							</div>
							<div style="display: flex;flex-direction: column;;width: 80px;">
								<small>Delay(s):</small>
								<input oninput="properties.update_transition_input(event)" class="quickcode-form-control quickcode-w-100 quickcode-transition_delay" value="0" step="0.1" min="0" type="number" />
							</div>
							<div style="display: flex;flex-direction: column;margin-right:10px;flex: 1">
								<small>Curve:</small>
								<select oninput="properties.update_transition_input(event)" class="quickcode-form-control quickcode-w-100 quickcode-transition_curve">
									<option value="linear">Linear</option>
									<option value="ease">Ease</option>
									<option value="ease-in">Ease-In</option>
									<option value="ease-out">Ease-Out</option>
									<option value="ease-in-out">Ease-In-Out</option>
									<option value="bounce">Bounce</option>
									<option value="bouncier">Bouncier</option>
									<option value="exponential">Exponential</option>
									<option value="cubic">Cubic</option>
									<option value="circular">Circular</option>
								</select>
							</div>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="" type="hidden" />
							<button onclick="actions.remove_property('transition')">x</button>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="text-transform" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Text transform:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="text-transform">
								<option value="capitalize">Capitalize</option>
								<option value="uppercase">Uppercase</option>
								<option value="lowercase">Lowercase</option>
								<option value="full-width">Full width</option>
								<option value="full-size-kana">Full size kana</option>
							</select>
							<button onclick="actions.remove_property('text-transform')">x</button>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="flex" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Flex:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" min="1" type="number" />
							<button onclick="actions.remove_property('flex')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="text-decoration" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Text Decoration:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="text-decoration">
								<option value="none">None</option>
								<option value="underline">Underline</option>
								<option value="overline">Overline</option>
								<option value="line-through">Line Through</option>
								<option value="blink">Blink</option>
							</select>
							<button onclick="actions.remove_property('text-decoration')">x</button>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Animation</div>
			<div class="quickcode-property-holder quickcode-hide">

					<div class="quickcode-property-group quickcode-w-100" property="animation-name" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Animation Name:</b></div>
						<div class="quickcode-input-group">
							
							<div style="display: flex;flex-direction: column;margin-right:10px;flex: 1">
								<select onchange="animator.restart()" class="quickcode-form-control quickcode-w-100 quickcode-data-source">
									<option value="">None</option>
									
									<option value="fade-in-from-left">Fade in From Left</option>
									<option value="fade-in-from-right">Fade in From Right</option>
									<option value="fade-in-from-top">Fade in From Top</option>
									<option value="fade-in-from-bottom">Fade in From Bottom</option>
									<option value="move-from-left">Move From Left</option>
									<option value="move-from-right">Move From Right</option>
									<option value="move-from-top">Move From Top</option>
									<option value="move-from-bottom">Move From Bottom</option>
									<option value="fade-rotate-from-left">Fade Rotate From Left</option>
									<option value="fade-rotate-from-right">Fade Rotate From Right</option>
									<option value="fade-rotate-from-top">Fade Rotate From Top</option>
									<option value="fade-rotate-from-bottom">Fade Rotate From Bottom</option>
									<option value="shake-horizontal">Shake Horizontal</option>
									<option value="jello-horizontal">Jello Horizontal</option>
									<option value="focus-in">Focus In</option>
									<option value="fade-in">Fade In</option>
									<option value="flip-horizontal-left">Flip Horizintal Left</option>
									<option value="flip-horizontal-right">Flip Horizintal Right</option>
									<option value="flip-vertical-left">Flip Vertical Left</option>
									<option value="flip-vertical-right">Flip Vertical Right</option>
									
								</select>
							</div>
							<button onclick="actions.remove_property('animation-name','attribute')">x</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="animate-on-view" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>When to animate:</b></div>
						<div class="quickcode-input-group">
							
							<div style="display: flex;flex-direction: column;margin-right:10px;flex: 1">
								<select onchange="animator.restart()" class="quickcode-form-control quickcode-w-100 quickcode-data-source">
									<option value="">None</option>
									<option value="false">Immediately</option>
									<option value="true">When in view</option>
									
								</select>
							</div>
						</div>
					</div>
					
					<div class="quickcode-property-group quickcode-w-100" property="animation-duration" propertyAppend="s" propertyType="attribute" propertyPrepend="">
						<div class="quickcode-input-group" style="align-items: center;">
							<div style="display: flex;flex-direction: column;width: 80px;">
								<small>Duration(s):</small>
								<input onchange="animator.restart()" class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="0" step="0.1" min="0" type="number" />
							</div>
							<button style="margin:5px" onclick="actions.remove_property('animation-duration','attribute')">x</button>
							<button style="margin:5px" onclick="animator.restart()">Play</button>
							<button style="margin:5px" onclick="animator.restart('all')">Play All</button>
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="animation-delay" propertyAppend="s" propertyType="attribute" propertyPrepend="">
						<div class="quickcode-input-group">
							<div style="display: flex;flex-direction: column;;width: 80px;">
								<small>Delay(s):</small>
								<input onchange="animator.restart()" class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="0" step="0.1" min="0" type="number" />
							</div>
 
							<button onclick="actions.remove_property('animation-delay','attribute')">x</button>
						</div>
					</div>
				</div>
 
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Table</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="columns" propertyAppend="" propertyType="tableAttribute" propertyPrepend="">
						<div><b>Table Columns:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" step="1" min="1" type="number" />
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="rows" propertyAppend="" propertyType="tableAttribute" propertyPrepend="">
						<div><b>Table Rows:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" step="1" min="1" type="number" />
						</div>
					</div>

				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="colspan" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Colspan:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" min="1" type="number" />
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="rowspan" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Rowspan</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" min="1" type="number" />
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Chart</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="chart-title" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Chart Title:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="" />
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="chart-type" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Chart Type:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-w-100 quickcode-data-source">
								<option value="bar">Bar Chart</option>
								<option value="doughnut">Doughnut Chart</option>
								<option value="pie">Pie Chart</option>
								<option value="line">Line Chart</option>
								<option value="polarArea">Polar Area Chart</option>
								<option value="radar">Radar Chart</option>

							</select>
						</div>
					</div>

				</div>
				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="colspan" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Colspan:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" min="1" type="number" />
						</div>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="rowspan" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Rowspan</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="1" min="1" type="number" />
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Content editable, Href, Opacity, Vertical align</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div style="display: flex;">
					<div class="quickcode-property-group quickcode-w-100" property="contenteditable" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Content editable:</b></div>
						<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="contenteditable">
							<option value="true">True</option>
							<option value="false">False</option>
						</select>
					</div>
					<div class="quickcode-property-group quickcode-w-100" property="href" propertyAppend="" propertyType="attribute" propertyPrepend="">
						<div><b>Href:</b></div>
						<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="" type="text" />
					</div>
					
				</div>
				<div class="quickcode-property-group quickcode-w-100" property="opacity" propertyAppend="" propertyType="style" propertyPrepend="">
					<div><b>Opacity:</b></div>
					<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="" type="number" step="0.1" min="0" max="1" />
				</div>
				<div class="quickcode-property-group quickcode-w-100" property="vertical-align" propertyAppend="" propertyType="style" propertyPrepend="">
					<div><b>Vertical align:</b></div>
					
					<select class="quickcode-form-control quickcode-data-source">
						<option value="baseline">Baseline</option>
						<option value="sub">Sub</option>
						<option value="super">Super</option>
						<option value="text">Text-top</option>
						<option value="text">Text-bottom</option>
						<option value="middle">Middle</option>
						<option value="top">Top</option>
						<option value="bottom">Bottom</option>
					</select>
				</div>	
				
			</div>
		</div>

		<div class="quickcode-property-title">
			<div onclick="properties.expand(event)">Image, Bg image, Icon, Object fit, Fill</div>
			<div class="quickcode-property-holder quickcode-hide">

				<div class="quickcode-property-group" property="src" propertyAppend="" propertyType="attribute"  propertyPrepend="">
					<div><b>Image:</b></div>
					<div style="text-align: center;display: flex;justify-content: center;">
						<img onclick="image_loader.load_images(event)" src="" source="quickcode-data-source" style="width:150px; height: 150px;object-fit: cover;">
						<button onclick="actions.remove_property('src','attribute')" style="width:50px">x</button>
					</div>
					<input type="hidden" class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" name="src" >
				</div>
				<div class="quickcode-property-group quickcode-w-100" property="object-fit" propertyAppend="" propertyType="style" propertyPrepend="">
					<div><b>Object Fit:</b></div>
					<div class="quickcode-input-group">
						<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="object-fit">
							<option value="none">None</option>
							<option value="cover">Cover</option>
							<option value="fill">Fill</option>
							<option value="contain">Contain</option>
							<option value="scale-down">Scale Down</option>
						</select>
						<button onclick="actions.remove_property('object-fit')">x</button>
					</div>
				</div>
				
				<div style="">
					<div style="display: flex;" class="quickcode-property-group" property="object-position" propertyAppend="" propertyType="style" propertyPrepend="">
						<div>
							<div><b>Object Position X:</b></div>
							<div class="quickcode-input-group">
								<input oninput="properties.update_object_position(event)" class="quickcode-form-control quickcode-w-100 quickcode-position_x" type="number" name="object-position" value="0" />
							</div>
						</div>
						<div>
							<div><b>Object Position Y:</b></div>
							<div class="quickcode-input-group">
								<input oninput="properties.update_object_position(event)" class="quickcode-form-control quickcode-w-100 quickcode-position_y" type="number" name="object-position" value="0" />
								<button onclick="actions.remove_property('object-position')">x</button>
								<div>
									<label><input type="radio" class="quickcode-object-positionAppendType" name="object-positionAppendType" value="px" checked /> px</label>
									<label><input type="radio" class="quickcode-object-positionAppendType" name="object-positionAppendType" value="%" /> %</label>
								</div>
							</div>
						</div>
						<input type="hidden" class="quickcode-data-source" name="" value="">
					</div>
				</div>

				<div class="quickcode-property-group" property="background-image" propertyAppend=")" propertyType="style"  propertyPrepend="url(">
					<div><b>BG Image:</b></div>
					<div class="quickcode-input-group">
						<div style="text-align: center;display: flex;justify-content: center;width: 100%;">
							<img onclick="image_loader.load_images(event)" src="" source="quickcode-data-source" style="width:150px; height: 150px;object-fit: cover;">
							<button onclick="actions.remove_property('background-image')" style="width:50px">x</button>
						</div>
						<input type="hidden" class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" name="background-image" >
					</div>
				</div>

				<div class="quickcode-property-group" property="class" propertyAppend="" propertyType="attribute"  propertyPrepend="">
					<div><b>Icon:</b></div>
					<div style="text-align: center;display: flex;justify-content: center;font-size: 50px;">
						<i onclick="image_loader.load_icons(event)"  class="quickcode-bi bi-people" source="quickcode-data-source" ></i>
					</div>
					<input type="hidden" class="quickcode-form-control quickcode-w-100 quickcode-data-source quickcode-hide" name="class" />
				</div>

				<div style="display: flex;">
					<div style="flex:1" class="quickcode-property-group" property="background-position-x" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Background Position X:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="background-position-x" value="0" />
							<button onclick="actions.remove_property('background-position-x')">x</button>
							<div>
								<label><input type="radio" class="quickcode-background-position-xAppendType" name="background-position-xAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-background-position-xAppendType" name="background-position-xAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>
					<div style="flex:1" class="quickcode-property-group" property="background-position-y" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Background Position Y:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="background-position-y" value="0" />
							<button onclick="actions.remove_property('background-position-y')">x</button>
							<div>
								<label><input type="radio" class="quickcode-background-position-yAppendType" name="background-position-yAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-background-position-yAppendType" name="background-position-yAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div style="flex:1" class="quickcode-property-group" property="background-size" propertyAppend="px" propertyType="style" propertyPrepend="">
						<div><b>Background Size:</b></div>
						<div class="quickcode-input-group">
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" type="number" name="background-size" value="0" />
							<button onclick="actions.remove_property('background-size')">x</button>
							<div>
								<label><input type="radio" class="quickcode-background-sizeAppendType" name="background-sizeAppendType" value="px" checked /> px</label>
								<label><input type="radio" class="quickcode-background-sizeAppendType" name="background-sizeAppendType" value="%" /> %</label>
							</div>
						</div>
					</div>
					<div style="flex:1" class="quickcode-property-group" property="background-repeat" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Background Repeat:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="background-repeat">
								<option value="repeat">Repeat</option>
								<option value="repeat-x">Repeat X</option>
								<option value="repeat-y">Repeat Y</option>
								<option value="no-repeat">No Repeat</option>
								<option value="space">Space</option>
								<option value="round">Round</option>
							</select>
							<button onclick="actions.remove_property('background-repeat')">x</button>
						</div>
					</div>
				</div>
				<div style="display: flex;">
 
					<div style="flex:1" class="quickcode-property-group" property="background-attachment" propertyAppend="" propertyType="style" propertyPrepend="">
						<div><b>Background Attachment:</b></div>
						<div class="quickcode-input-group">
							<select class="quickcode-form-control quickcode-data-source quickcode-w-100" name="background-attachment">
								<option value="scroll">Scroll</option>
								<option value="fixed">Fixed</option>
								<option value="local">Local</option>
							</select>
							<button onclick="actions.remove_property('background-attachment')">x</button>
						</div>
					</div>
				</div>

				<div style="display: flex;">
					<div style="max-width:180px" class="quickcode-property-group" property="fill" propertyAppend="" propertyType="attribute"  propertyPrepend="">
						<div class="quickcode-input-group">
							<div class="quickcode-w-50"><b>Fill:</b></div>
							<input class="quickcode-form-control quickcode-w-100 quickcode-data-source" value="#000000FF" data-jscolor="{}">
							<button onclick="actions.remove_property('fill','attribute')">x</button>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<div class="quickcode-property-group" property="style" propertyAppend="" propertyType="attribute"  propertyPrepend="">
			<div><b>Styles:</b></div>
			<textarea rows="10" class="quickcode-form-control quickcode-w-100 quickcode-data-source" name="style"></textarea>
		</div>
		<div style="height:400px;background"></div>
	</div>
</div>
