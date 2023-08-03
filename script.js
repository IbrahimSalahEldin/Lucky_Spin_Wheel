function shuffle(array) {
    var currentIndex = array.length,
      randomIndex;
  
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
  
      // And swap it with the current element.
      [array[currentIndex], array[randomIndex]] = [
        array[randomIndex],
        array[currentIndex],
      ];
    }
  
    return array;
  }
  
  function spin() {
    // Play the sound
    wheel.play();
    // Inisialisasi variabel
    const box = document.getElementById("box");
    const element = document.getElementById("mainbox");
    let SelectedItem = "";
  
    let MagicRoaster = shuffle([1890, 2250, 2610]);
    let Sepeda = shuffle([1850, 2210, 2570]); //Kemungkinan : 100%
    let RiceCooker = shuffle([1810, 2170, 2530]);
    let LunchBox = shuffle([1770, 2130, 2490]);
    let Sanken = shuffle([1750, 2110, 2470]);
    let Electrolux = shuffle([1630, 1990, 2350]);
    let JblSpeaker = shuffle([1570, 1930, 2290]);
  
    function shuffle(array) {
        var currentIndex = array.length,
          randomIndex;
      
        // While there remain elements to shuffle...
        while (0 !== currentIndex) {
          // Pick a remaining element...
          randomIndex = Math.floor(Math.random() * currentIndex);
          currentIndex--;
      
          // And swap it with the current element.
          [array[currentIndex], array[randomIndex]] = [
            array[randomIndex],
            array[currentIndex],
          ];
        }
      
        return array;
    }
    
    function spin() {
        // Play the sound
        wheel.play();
    
        const box = document.getElementById("box");
        const element = document.getElementById("mainbox");
        let SelectedItem = "";
    
        let MagicRoaster = shuffle([1890, 2250, 2610]);
        let Sepeda = shuffle([1850, 2210, 2570]);
        let RiceCooker = shuffle([1810, 2170, 2530]);
        let LunchBox = shuffle([1770, 2130, 2490]);
        let Sanken = shuffle([1750, 2110, 2470]);
        let Electrolux = shuffle([1630, 1990, 2350]);
        let JblSpeaker = shuffle([1570, 1930, 2290]);
        let Mix = shuffle([1650, 2010, 2370]);
    
        let Hasil = shuffle([
            MagicRoaster[0],
            Sepeda[0],
            RiceCooker[0],
            LunchBox[0],
            Sanken[0],
            Electrolux[0],
            JblSpeaker[0],
            Mix[0],
            // Add more prize values here if needed
        ]);
    
        // Calculate the selected prize index
        let prizeIndex = Hasil[0] / 360 * 12;
        prizeIndex = Math.floor(prizeIndex) % 12;
    
        // Retrieve the selected prize
        SelectedItem = document.getElementsByClassName("font")[prizeIndex].innerText;
    
        box.style.setProperty("transition", "all ease 5s");
        box.style.transform = "rotate(" + Hasil[0] + "deg)";
        element.classList.remove("animate");
        setTimeout(function() {
            element.classList.add("animate");
        }, 5000);
    
        setTimeout(function() {
            applause.play();
            swal(
                "Congratulations",
                " انت كسب معنا  " + SelectedItem + ".",
                "success"
            );
        }, 5500);
    
        setTimeout(function() {
            box.style.setProperty("transition", "initial");
            box.style.transform = "rotate(90deg)";
        }, 6000);
    }
    
    let Hasil = shuffle([
      MagicRoaster[0],
      Sepeda[0],
      RiceCooker[0],
      LunchBox[0],
      Sanken[0],
      Electrolux[0],
      JblSpeaker[0],
    ]);
    // console.log(Hasil[0]);
  
    // Ambil value item yang terpilih
    if (MagicRoaster.includes(Hasil[0])) SelectedItem = "100 نقطة";
    if (Sepeda.includes(Hasil[0])) SelectedItem = "بوكس الهبة";
    if (RiceCooker.includes(Hasil[0])) SelectedItem = "برجر باربكيو سماش";
    if (LunchBox.includes(Hasil[0])) SelectedItem = "500 ريال";
    if (Sanken.includes(Hasil[0])) SelectedItem = "توصيل مجاني ";
    if (Electrolux.includes(Hasil[0])) SelectedItem = "100 ريال";
    if (JblSpeaker.includes(Hasil[0])) SelectedItem = "كوكيز";
  
    // Proses
    box.style.setProperty("transition", "all ease 5s");
    box.style.transform = "rotate(" + Hasil[0] + "deg)";
    element.classList.remove("animate");
    setTimeout(function() {
      element.classList.add("animate");
    }, 5000);
  
    // Munculkan Alert
    setTimeout(function() {
      applause.play();
      swal(
        "Congratulations",
        " انت كسب معنا  " + SelectedItem + ".",
        "success"
      );
    }, 5500);
  
    // Delay and set to normal state
    setTimeout(function() {
      box.style.setProperty("transition", "initial");
      box.style.transform = "rotate(90deg)";
    }, 6000);
  }