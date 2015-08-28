jQuery(document).ready(function($) {
	
function Slider(slider , button){
	this.pause = 3000;
	this.animateTime = 1000;
	this.slider = slider;
	this.button = button;
	this.sliderBackground = this.slider.filter('.slider_background');
	this.sliderList = this.slider.find('.slider_list');
	this.sliderItem = this.sliderList.find('.slider_item');
	this.cloneFirstElem();
	
	this.sliderList = this.slider.find('.slider_list');
	this.sliderItem = this.sliderList.find('.slider_item');
	this.sliderImgList = this.sliderItem.find(' > img');
	this.itemCount = this.sliderList[0].childElementCount;
	this.itemCurrent = 1;
	this.sliderBackgroundColor = $('.slider_background');
	
	this.interval;

	this.slider
			.on('mouseenter',this.pauseSlider.bind(this))
			.on('mouseleave',this.runSlider.bind(this));

	//this.button.on('click',this.buttonClicked.bind(this));
	this.button.on('click',function(evt){
		this.buttonClicked($(evt.target).data('dir'));
	}.bind(this));

	this.runSlider();
	//Setting for every img margin
	for(i=0 ; i<this.sliderImgList.length ; i++ ){
		$(this.sliderImgList[i]).css('margin-left',(1027-this.sliderImgList[i].width)/2);
		$(this.sliderImgList[i]).css('margin-right',(1027-this.sliderImgList[i].width)/2);
	}
}



Slider.prototype.runSlider = function(){
	
	this.interval = setInterval(function(){
		this.animateSlider('-=');
	}.bind(this),this.pause);
}

Slider.prototype.pauseSlider = function(){
	clearInterval(this.interval);
}

Slider.prototype.animateSlider = function(direction){
	
	if(!(direction == '+=' && this.itemCurrent == 1)){
		this.slider.animate({backgroundColor : 'rgb('+this.rgbRand()+','+this.rgbRand()+','+this.rgbRand()+')'},this.animateTime);
		this.sliderList.animate({'left': direction+'1027'},this.animateTime,function(){
			if (direction == '-=') {
				this.itemCurrent++;
			}else{
				this.itemCurrent--;
			}
			this.checkIfLastItem();
		}.bind(this));
	}
}


Slider.prototype.checkIfLastItem = function(){
	if (this.itemCurrent == this.itemCount) {
		this.sliderList.css('left','0');
		this.itemCurrent = 1;
	};
}

Slider.prototype.buttonClicked = function(buttonName){
	if(buttonName == 'next'){
		this.animateSlider('-=');
	}else{
		this.animateSlider('+=');
	}
}

Slider.prototype.rgbRand = function(){
	return Math.floor(Math.random() * 255);
}

Slider.prototype.cloneFirstElem = function(){
	$(this.sliderItem[0]).clone().appendTo(this.sliderList);
}
	
	var obj = new Slider($('.slider'),$('.slider_arrow'));
	
});