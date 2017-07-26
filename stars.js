var height = 400;
var width = 200;

var x = d3.scaleLinear()
  .domain([0, 100])
  .range([0, width]);

var y = d3.scaleLinear()
  .domain([0, 100])
  .range([0, height]);

var colors = ["#9E5555", "#FF7F7F", "#FFFFFF"];
var colorScale = d3.scaleQuantize().domain([0,1]).range(colors);

var starData = d3.range(30).map(function() {
  var random = Math.random()
  var dataObject =  {
    x: Math.random() * 100,
    y: Math.random() * 100,
    yv: (random * 10) / 7,
    size: (random * 1.5) + 0.5,
    color: colorScale(random)
  };

  return dataObject;
});

var canvas = d3.select("#canvas").append("canvas")
    .attr("width", width)
    .attr("height", height)
    .attr("id", "star-canvas");

// node returns first dom element in a selection
var context = canvas.node().getContext("2d");

d3.timer(function() {
  context.clearRect(0, 0, width, height);

  starData.forEach(function(d) {
    d.y += d.yv;

    // Recycle old circles
    if(d.y > (100 + d.size) ) {
      d.y = 0 - d.size;
    }

     context.fillStyle = d.color;
     context.beginPath();
     context.arc(x(d.x), y(d.y), d.size, 0, 2 * Math.PI);

     context.fill();
   });
});
