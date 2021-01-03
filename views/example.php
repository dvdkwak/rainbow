<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your first Route!</title>
    <link rel="icon"
          type="image/png"
          href="<?= asset("favicon.png"); ?>">
    <style>
        body {
            margin: 0;
            font-family: Helvetica;
            background: deepskyblue;
            color: white;
        }
        .text-box {
            margin: 0 auto;
            max-width: 700px;
            width: 80%;
            position: absolute;
            top: 50px;
            z-index: 2;
            text-align: center;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="text-box">
        <h1>Awesome! You have created your first Route!</h1>
        <h3>Now it is time to say goodbye to me... and start your own templates!</h3>
        <h5><i>And by the way! check my file in the editor to see some convient tips to help you get started!</i></h5>
    </div>

    <!--  As you can see here, this is how to add and use the library folder!  -->
    <!--  Oh! And p5 has already been added for your convenience with a little demo even!  -->
    <script src="<?= asset('/lib/p5.min.js') ?>"></script>
    <script>
        function setup() {
            // creating the canvas
            createCanvas(windowWidth, windowHeight);
            // array containing all raindrops
            rain = [];
            // adding a few raindrops to the screen
            for(i = 0; i < 100; i++) {
                // creating a drop with a ranom size at a random location on top
                rain.push(new RainDrop(5 + Math.floor(Math.random() * windowWidth)));
                // setting the falling speed at random
                let number = Math.floor(Math.random()*10);
                rain[i].setGravity((8 + number));
                // setting the size random between 3 and 10
                rain[i].setSize(3 + number);
            }
        }
        function draw() {
            // repainting the screen to black
            background(0, 191, 255);
            // updating and drawing all raindrops
            rain.map(function(drop) {
                // when a drop touches the ground and it is not melting yet
                if(drop.isTouchingGround) {
                    drop.startMelting();
                    // if not already created a new one, create a new drop
                    if(!drop.createdNewOne) {
                        let newDrop = new RainDrop(5 + Math.floor(Math.random() * windowWidth));
                        // setting the falling speed at random
                        let number = Math.floor(Math.random()*10);
                        newDrop.setGravity((8 + number));
                        // setting the size random between 3 and 10
                        newDrop.setSize(3 + number);
                        rain.push(newDrop);
                        drop.createdNewOne = true;
                    }
                }
                // if a drop has melted, remove it from the array
                if(drop.isMelted) {
                    let index = rain.indexOf(drop);
                    rain.splice(index, 1);
                }
                // putting the drop on screen
                drop.draw();
            });
        }
        class RainDrop {
            isTouchingGround = false;
            g = 5;
            isMelting = false;
            isMelted = false;
            meltSpeed = 3000;
            // setting the x, y and size value of the object
            constructor(x = 5, y = 0, size = 10) {
                this.x = x;
                this.y = y;
                this.size = size;
            }
            // putting the flake on screen and applying gravity
            draw() {
                fill(255, 255, 255);
                ellipse(this.x, this.y, this.size);
                this.applyGravity();
            }
            // letting the object fall down until the ground is touched
            applyGravity() {
                if(!this.isTouchingGround) {
                    this.y += this.g;
                    if(this.y >= windowHeight - this.size/2) {
                        this.isTouchingGround = true;
                    }
                }
            }
            // action when the snow flake is starting to melt
            startMelting(ms = this.meltSpeed) {
                if(!this.isMelting) {
                    this.isMelting = true;
                    setTimeout( () => {
                        this.isMelted = true;
                    }, this.meltSpeed);
                }
            }
            setGravity(g) {
                this.g = g;
            }
            setSize(size) {
                this.size = size;
            }
            setMeltingSpeed(ms) {
                this.meltSpeed = ms;
            }
        }
    </script>
</body>
</html>