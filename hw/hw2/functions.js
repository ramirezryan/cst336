// Ryan Ramirez
// HW2 - Internet Programming with Dr. Lara
// Javascript function for retrieving form values and computing costs.


$("#submitButton").on("click" , function() {
    var cpu_choice = $("input[name=cpu_radio]:checked").val()
    var ram_choice = $("#ram_select").val();
    var gpu_choice = $("input[name=gpu_radio]:checked").val()
    // disk choice is handled by checkboxes, so we will check which boxes were selected further into this function.
    var mc_choice = $("input[name=mc_radio]:checked").val();
    var color_choice = $("#color_text").val().toLowerCase();
    
    var total = 0;
    
    // validate
    if (cpu_choice == null) {
        alert("Select a CPU");
        return;
    }
    else if (ram_choice == "Select One") {
        alert("Select an option for RAM");
        return;
    }
    else if (gpu_choice == null) {
        alert("Select a GPU");
        return;
    }
    else if (!$("#hdd500gb").is(":checked") && !$("#ssd500gb").is(":checked") && !$("#hdd1tb").is(":checked") && !$("#ssd1tb").is(":checked")) {
        alert("Choose one or more options for disk");
        return;
    }
    else if (mc_choice == null) {
        alert("Select the size for your computer");
        return;
    }
    else if (color_choice == "") {
        alert("Please choose a color for your case");
        return;
    }
    
    // check cpu choice
    if (cpu_choice == "intel")
        total += 175;
    else if (cpu_choice == "AMD")
        total += 150;
    
    // check ram choice
    if (ram_choice == "2 GB")
        total += 20;
    else if (ram_choice == "4 GB")
        total += 40;
    else if (ram_choice == "8 GB")
        total += 80;
    else if (ram_choice == "16 GB")
        total += 160;
    else if (ram_choice == "32 GB")
        total += 320;
        
    // check gpu choice
    if (gpu_choice == "gtx1070")
        total += 400;
    else if (gpu_choice == "gtx1080")
        total += 500;
    else if (gpu_choice == "rtx1070")
        total += 600;
    else if (gpu_choice == "rtx2080")
        total += 700;
        
    // check disk choice(s)
    if ($("#hdd500gb").is(":checked"))
        total += 25;
    if ($("#hdd1tb").is(":checked"))
        total += 50;
    if ($("#ssd500gb").is(":checked"))
        total += 75;
    if ($("#ssd1tb").is(":checked"))
        total += 150;
        
    // check mc choice
    if (mc_choice == "micro")
        total += 110;
    else if (mc_choice == "mini")
        total += 165;
    else if (mc_choice == "atx")
        total += 220;
        
    $("#total").html("Total: $" + total);
    $("#preview_text").html("If we recognized your color, here's a sample of the it that that you picked for your case:");
    $("#color_preview").css("background-color", color_choice);
});