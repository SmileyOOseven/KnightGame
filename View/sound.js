const fightBtn = document.getElementById("fightBtn")

fightBtn.onmouseover = () => {
    const audio = new Audio("assets/sounds/audioLaser.mp3");
    audio.play();
};
