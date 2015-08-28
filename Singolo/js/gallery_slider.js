(function(){
	function Gallery_Slider(el,gll_data,galleryData){

		this.el = el;
		this.galleryData = galleryData;
		this.gll_data = gll_data;
		this.button = this.el.find('.gallery_arrow');
		this.imagineList = this.gll_data.find('img');
		this.imagineZoom = this.el.find('.gallery_zoom');
		this.imagineClose = this.imagineZoom.find('.gallery_close');
		this.currentImgNr ;


		this.button.on('click',function(evt){

			this.OnArrowPress(this,$(evt.target).data('arrow'));

		}.bind(this));
		

		this.imagineClose.on('click',function(evt){
			$(this.el).fadeOut('fast');
		}.bind(this));
		$(this.el).fadeOut('fast');
	}

	Gallery_Slider.prototype.OnArrowPress = function(event,arrow_data){	
		
		if ((this.checkZoomImg(this,arrow_data))) {
			if(arrow_data === "next" && this.currentImgNr <= this.imagineList.length-1){
				this.removeZoomImg(this);
				$(this.imagineList[this.currentImgNr]).clone().appendTo(this.imagineZoom);
			}else if(arrow_data === "prev" && this.currentImgNr >= 0){
				this.removeZoomImg(this);
				$(this.imagineList[this.currentImgNr]).clone().appendTo(this.imagineZoom);
			}
		};
	}

	Gallery_Slider.prototype.OnImgPress = function(event,imagineNumber){
		$(this.el).fadeIn('fast');
		this.currentImgNr = imagineNumber;
		this.removeZoomImg(this);	
		$(this.imagineList[imagineNumber]).clone().appendTo(this.imagineZoom);
		
	}

	Gallery_Slider.prototype.removeZoomImg = function(event){
		this.imagine = this.imagineZoom.find('> img');
		$(this.imagine).remove();
	}

	Gallery_Slider.prototype.checkZoomImg = function(event,arrow_data){
		var foundIT = false;
		var j;
		if(arrow_data === "prev" && this.currentImgNr != 0){
			j =-1;
			this.currentImgNr = Number(this.currentImgNr) + j;
		}
		else if(arrow_data === "next" && this.currentImgNr != this.imagineList.length-1){
			j= +1;
			this.currentImgNr = Number(this.currentImgNr) + j;
		}

		while(!foundIT && this.currentImgNr >= 0 && this.currentImgNr <= this.imagineList.length-1){
			console.log($(this.imagineList[this.currentImgNr]));
			console.log($(this.imagineList[this.currentImgNr]).context);
			console.log($(this.imagineList[this.currentImgNr]).context.style.display);

			if($(this.imagineList[this.currentImgNr]).context.style.display != "none"){
				foundIT = true;
			}
			else
			{
				this.currentImgNr = this.currentImgNr + j;
			}
		}

		return foundIT;

	}

	window.Gallery_Slider = Gallery_Slider;
}());