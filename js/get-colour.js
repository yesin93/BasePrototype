//Createing Colour Thief Instance
var colorThief = new ColorThief();

//Colour Palette Colours
var colour1;
var colour2;
var colour3;
var colour4;
var colour5;

//Image Colour Palette Extraction Array
var extractionResult;
//Obtain jQuery DOM object
var sourceImageObj = $('#target-image');
//assign image object to variable
var sourceImage = sourceImageObj[0];

$('#btn-predict-affect').click(function () {
    extractPalette();
    console.log(extractionResult);
    assignFiveColours(extractionResult);
});

function extractPalette() {
    extractionResult = colorThief.getPalette(sourceImage, 5);
}

//Assigning the 5 Colour Palette Variables 
function assignFiveColours(result) {
    colour1 = rgbToHexConvert(result[0][0], result[0][1], result[0][2]);
    colour2 = rgbToHexConvert(result[1][0], result[1][1], result[1][2]);
    colour3 = rgbToHexConvert(result[2][0], result[2][1], result[2][2]);
    colour4 = rgbToHexConvert(result[3][0], result[3][1], result[3][2]);
    colour5 = rgbToHexConvert(result[4][0], result[4][1], result[4][2]);

    console.log(colour1);
    console.log(colour2);
    console.log(colour3);
    console.log(colour4);
    console.log(colour5);
}

//segmenting and dividing RGB values eperately
function oneThirdHex(rgbSegment) {
    var hexComponent = rgbSegment.toString(16);
    return hexComponent.length == 1 ? "0" + hexComponent : hexComponent;
}

//Converting RGB collur value to HEX
function rgbToHexConvert(r, g, b) {
    return "#" + oneThirdHex(r) + oneThirdHex(g) + oneThirdHex(b);
}
