var fs = require('fs') 
var readline = require('readline')

var coordinates = [0, 0, 0]

var rd = readline.createInterface({
    input: fs.createReadStream('./input/input_day2.txt')
})

rd.on('line', function(line) {
    let instruction = line.split(' ')
    let direction   = instruction[0]
    let distance    = parseInt(instruction[1])

    switch (direction) {
        case 'forward':
            coordinates[0] += distance
            if (coordinates[2] > 0) coordinates[1] += distance * coordinates[2]
            break;
        case 'down':
            coordinates[2] += distance
            break;
        case 'up':
            coordinates[2] -= distance
            break;
        default : break;
    }
});

rd.on('close', function(){
    let answer = coordinates[0] * coordinates[1]
    console.log(answer)
})