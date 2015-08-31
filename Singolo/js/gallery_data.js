(function(){
	function Gallery_Data(el,gll_data){
		this.el = el;
		this.gll_data = gll_data;
		this.showGallery();
		this.imagineList = this.el.find('img');

		this.imagineList.on('click',function(evt){
			el.trigger('imagineClick',evt.target.id);
		}.bind(this));
	}

	Gallery_Data.prototype.showGallery = function(){
		var i = 0;
		_.each(galleryData,function(imagine){
			this.el.append('<a href="'+imagine.postLink+'"><img id="'+i+'"src="'+imagine.url+'" data-gall="'+imagine.type+'"></a>');
			i++;
		}.bind(this));
	}
	
	Gallery_Data.prototype.changeGallery = function(event,filter_trigger){
		
		_.each(this.imagineList,function(imagine){
			var foundIT = false;
			var imagineType = imagine.dataset.gall;
			var imagineType_split = imagineType.split(" ");
			for(i=0 ; i<imagineType_split.length ; i++){
				if (imagineType_split[i] === filter_trigger) {
					foundIT=true;
				};
			}
			debugger
			if (!foundIT) {
				$(imagine).fadeOut('slow');
			}else{
				$(imagine).fadeIn('slow');
			};
		}.bind(this));
	}
	

  window.Gallery_Data = Gallery_Data;
}());