var colorThief = new ColorThief();

$('#btn-predict-affect').click(function () {
    var sourceImage = $('#target-image');
    console.log(sourceImage[0]);
    var extractionResult = colorThief.getPalette(sourceImage[0], 5);
    console.log(extractionResult);
});
