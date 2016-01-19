Array.prototype.unique3 = function(){
 var res = [];
 var json = {};
 var dejson = {};
 var length = 0;
 for(var i = 0; i < this.length; i++){
  if(!json[this[i].name]){
   dejson[this[i]] = this[i];
   console.log(dejson[this[i]]);
   length++;
   json[this[i].name] = 1;
  }else{
  	console.log(dejson[this[i]].value);
  	dejson[this[i]].value = (dejson[this[i]].value + this[i].value)/2;
  	console.log(dejson[this[i]].value);
  }
 }
 console.log(length);
 for(var i = 0; i<length;i++){
 	res.push(dejson[this[i]]);
 }
 return res;
}

var arr = [
	{"name":"九龙坡区","value":72},
	{"name":"巴南区","value":90},
	{"name":"巴南区","value":70}
]
console.log(arr.unique3());

+ this[i].value)/2;