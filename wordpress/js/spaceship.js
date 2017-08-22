function generateSpaceship(config) {
  var data = Object.assign({}, config.data);
  if (data.current > data.total) {
    data.total = data.current;
  }

  var height = config.height;
  var width = config.width;
  var rocketHeight = 55;
  var rocketWidth = 11;
  var padding = config.padding;
  var heightPadded = height + padding.top + padding.bottom;
  var widthPadded = width + padding.left + padding.right;

  var yScale = d3.scaleLinear()
    .domain([0, data.total])
    .range([0, height])

  var axisScale = d3.scaleLinear()
    .domain([0, data.total])
    .range([height, 0])

  var flameWidthScale = d3.scaleLinear()
    .domain([0, data.total])
    .range([1, 4])

  var labelColorScale = d3.scaleLinear().domain([0,4]).range([d3.rgb("#FF2525"), d3.rgb('#FFFFFF')]);

  var rocket = d3.select(config.selector + " #rocket-container")
    .attr("style", "position: absolute; left: calc(50% - 5px); bottom: 0;");

  var rocketFlame = d3.select(config.selector + " #rocket-flames")
    .attr("style", "position: absolute; left: calc(50% - 5px); bottom: 0; ");

  var numberAxis = d3.axisRight(axisScale)
    .ticks(5, "s");

  var circleAxis = d3.axisRight(axisScale)
    .ticks(40)
    .tickFormat("");


  d3.select(config.selector)
    .attr("style", "width:" + widthPadded + "px; height: "+ heightPadded +"px;")

  d3.select(config.selector)
    .append("svg")
    .attr("class", "axisSvg")
    .attr("width", width + padding.left + padding.right)
    .attr("height", height + padding.top + padding.bottom)
      .append("g")
      .attr("transform", "translate("+ padding.left +","+ padding.top +")")
      .attr("class", "number-axis")
      .call(numberAxis)
      .append("g")
      .attr("class", "circle-axis")
      .call(circleAxis);

  var numberTicks = d3.selectAll(".number-axis .tick");
    numberTicks
      .each(function(d, i) {
      d3.select(this).select("text")
        .attr("fill", labelColorScale(i));
    })

  var circleTicks = d3.selectAll(config.selector + " .circle-axis .tick");
  circleTicks.each(function() {
    d3.select(this)
      .append("circle")
      .attr("r", 3)
      .attr("fill", "rgba(142,52,52,0.4)");
  });

  d3.selectAll("line").remove();
  d3.selectAll(".domain").remove();

  function updateRocket() {
    var flameCurrent = yScale(data.current) + 50;
    circleTicks.selectAll(config.selector + " circle")
      .transition()
        .delay(1000)
        .duration(1000)
      .attr("fill", function(d) {
        return d <= data.current ? "#FF2020" : "rgba(142,52,52,0.4)"
      });

    var flameContainer = rocketFlame.transition()
      .delay(1000)
      .duration(1000)
      .attr("height", flameCurrent)
      .attr("style", "position: absolute; left: calc(50% - 5px); bottom: 0; transform: scaleX(" + flameWidthScale(data.current) + ") ")
      .attr("viewBox", "0 0 11 " + flameCurrent);

    flameContainer.select(config.selector + " #rocket-flame-light")
        .attr("points", "5.5 0.71875 11 " + flameCurrent + " 0 " + flameCurrent + "");

    flameContainer.select(config.selector + " #rocket-flame-dark")
      .attr("points", "5.5 0.71875 9 " + flameCurrent + " 2 " + flameCurrent + "");

    rocket.transition()
      .delay(1000)
      .duration(1000)
      .attr("style", "position: absolute; left: calc(50% - 5px); bottom: "+ yScale(data.current)+"; ");
  }

  updateRocket()

}
