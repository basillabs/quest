var height = (height + padding.top + padding.bottom) * 2;
var width = (width + padding.left + padding.right) * 2;

var x = d3.scaleLinear()
  .domain([0, 100])
  .range([0, width]);

var y = d3.scaleLinear()
  .domain([0, 100])
  .range([0, height]);

var colors = ["#9E5555", "#FF7F7F", "#FFDADA"];
var colorScale = d3.scaleQuantize().domain([0,1]).range(colors);

var starData = d3.range(80).map(function() {
  var random = Math.random()
  var dataObject =  {
    x: Math.random() * 100,
    y: Math.random() * 100,
    yv: random < 0.95 ? random / 10 : random,
    size: (random * 3),
    color: colorScale(random)
  };

  return dataObject;
});

var canvas = d3.select("#canvas").insert("canvas", ":first-child")
    .attr("width", width)
    .attr("height", height)
    .attr("id", "star-canvas");

// node returns first dom element in a selection
var context = canvas.node().getContext("2d");

d3.timer(function() {
  context.clearRect(0, 0, width, height);
  // context.fillStyle = 'rgba(33,23,24,0.6)';
  // context.fillRect(0, 0, width, height);
  starData.forEach(function(d) {
    d.y += d.yv;

    // Recycle old circles
    if(d.y > (100 + d.size) ) {
      d.y = 0 - d.size;
      d.x = Math.random() * 100;
    }

     context.fillStyle = d.color;
     context.beginPath();
     context.arc(x(d.x), y(d.y), d.size, 0, 2 * Math.PI);

     context.fill();
   });
});
