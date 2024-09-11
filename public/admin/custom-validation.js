// function createFormGroup(label, id, placeholder = '', type = 'text') {
//     return `
//         <div class="col-4 mt-2">
//             <label for="${id}">${label}</label>
//             <input type="${type}" class="form-control" id="${id}" placeholder="${placeholder}">
//         </div>`;
// }

// function createSelectGroup(label, id, options) {
//     const optionsHtml = options.map(option => `<option>${option}</option>`).join('');
//     return `
//         <div class="col-4 mt-2">
//             <label for="${id}">${label}</label>
//             <select class="custom-select rounded-0" id="${id}">
//                 ${optionsHtml}
//             </select>
//         </div>`;
// }

// function updateFormFields() {
//     const stoneType = document.getElementById('stoneType').value;
//     const additionalFields = document.getElementById('additionalFields');
//     additionalFields.innerHTML = ''; // Clear previous fields

//     const shapes = ['Round', 'Oval', 'Emerald', 'Radiant', 'Pear', 'Cushion', 'Elongated Cushion', 'Elongated Hexagon', 'Marquise', 'Princess', 'Asscher', 'Heart'];
//     switch (stoneType) {
//         case 'lab-grow-diamond':
//         additionalFields.innerHTML = 
//             createSelectGroup('Shape', 'shape', shapes) +
//             createFormGroup('Carat', 'carat', 'Enter carat') +
//             createFormGroup('Price', 'price', 'Enter price') +
//             createSelectGroup('Colour', 'colour', ['J', 'I', 'H', 'G', 'F', 'E', 'D']) +
//             createSelectGroup('Cut', 'cut', ['Excellent', 'Ideal']) +
//             createSelectGroup('Clarity', 'clarity', ['I1', 'SI2', 'SI1', 'VS2', 'VS1', 'VVS2', 'VVS1', 'IF', 'FL']) +
//             createFormGroup('Depth %', 'depth', 'Enter depth %') +
//             createFormGroup('Table %', 'table', 'Enter table %') +
//             createFormGroup('Length/Width Ratio', 'lengthWidthRatio', 'Enter length/width ratio');
//         break;
//         case 'coloured-lab-grow-diamond':
//             additionalFields.innerHTML = 
//                 createSelectGroup('Shape', 'shape', shapes) +
//                 createSelectGroup('Color', 'color', ['Pink', 'Blue', 'Yellow']) +
//                 createSelectGroup('Clarity', 'clarity', ['I1', 'SI2', 'SI1', 'VS2', 'VS1', 'VVS2', 'VVS1', 'IF', 'FL']);
//             break;
//         case 'moissanite':
//             additionalFields.innerHTML = 
//                 createSelectGroup('Shape', 'shape', shapes) +
//                 createSelectGroup('Color', 'color', ['Colourless', 'Clover Green', 'Smokey Grey', 'Sunshine Yellow', 'Champagne', 'Midnight Blue', 'Seafoam Green', 'Sandy Yellow']);
//             break;
//         case 'sapphire':
//             additionalFields.innerHTML = 
//                 createSelectGroup('Shape', 'shape', shapes) +
//                 createSelectGroup('Color', 'color', ['Round','Oval','Emerald', 'Radiant','Pear','Cushion','Elongated','Elongated','Marquise','Princess','Asscher','Heart']);
//             break;    
//     }   
 
//   }


function updateFormFields() {
    const stoneType = document.getElementById('stoneType').value;
    const additionalFields = document.getElementById('additionalFields');
    additionalFields.innerHTML = ''; // Clear previous fields

    if (stoneType === 'lab-grown-diamond') {
      additionalFields.innerHTML = 
        `<div class="col-4 mt-2">
              <label for="exampleSelectRounded0">Shape </label>
              <select class="custom-select rounded-0" name="stone_shape_type" id="stone_shape_type" id="exampleSelectRounded0">
                      <option value="Round">Round</option>
                      <option value="Oval">Oval</option>
                      <option value="Emerald">Emerald</option>
                      <option value="Radiant">Radiant</option>
                      <option value="Pear">Pear</option>
                      <option value="Cushion">Cushion</option>
                      <option value="Elongated cushion">Elongated Cushion</option>
                      <option value="Elongated hexagon">Elongated Hexagon</option>
                      <option value="Marquise">Marquise</option>
                      <option value="Princess">Princess</option>
                      <option value="Asscher">Asscher</option>
                      <option value="Heart">Heart</option>
              </select> 
              <span id="stone_shape_type-error" class="invalid-feedback"></span>
        </div>
        <div class="col-4 mt-2">
          <label for="shape">Carat</label>
          <input type="text" class="form-control" name="stone_carat" id="stone_carat" placeholder="Enter Carat">
           <span id="stone_carat-error" class="invalid-feedback"></span>
        </div>
        <div class="col-4 mt-2">
          <label for="shape">Price</label>
          <input type="text" class="form-control" name="stone_price" id="stone_price" placeholder="Enter Price">
          <span id="stone_price-error" class="invalid-feedback"></span>
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Colour</label>
            <select class="custom-select rounded-0" name="stone_color" id="stone_color">
              <option value="J">J</option>
              <option value="I">I</option>
              <option value="H">H</option>
              <option value="G">G</option>
              <option value="F">F</option>
              <option value="E">E</option>
              <option value="D">D</option>
            </select> 
            <span id="stone_color-error" class="invalid-feedback"></span>
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Cut</label>
            <select class="custom-select rounded-0" name="stone_cut" id="stone_cut">
              <option value="Excellent">Excellent</option>
              <option value="Ideal">Ideal</option>
            </select> 
            <span id="stone_cut-error" class="invalid-feedback"></span>
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Clarity</label>
            <select class="custom-select rounded-0"  name="stone_clarity" id="stone_clarity">
              <option value="I1">I1</option>
              <option value="SI2">SI2</option>
              <option value="SI1">SI1</option>
              <option value="VS2">VS2</option>
              <option value="VS1">VS1</option>
              <option value="VVS2">VVS2</option>
              <option value="VVS1">VVS1</option>
              <option value="IF">IF</option>
              <option value="FL">FL</option>
            </select> 
            <span id="stone_clarity-error" class="invalid-feedback"></span>
        </div>
        <div class="col-4 mt-2">
          <label for="shape">Depth %</label>
          <input type="text" class="form-control" name="stone_depth" id="stone_depth" placeholder="Enter Depth %">
             
        </div>
        <div class="col-4 mt-2">
          <label for="shape">Table %</label>
          <input type="text" class="form-control" name="stone_table" id="stone_table" placeholder="Enter Table %">
          
        </div>
        <div class="col-4 mt-2">
          <label for="shape">Length/Width Ratio</label>
          <input type="text" class="form-control" name="stone_ratio" id="stone_ratio" placeholder="Enter Ratio">
          
        </div>`
      ;
    } else if (stoneType === 'coloured-lab-grown-diamond') {
      additionalFields.innerHTML = `
      <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Shape </label>
            <select class="custom-select rounded-0"  name="stone_shape_type" id="stone_shape_type">
                <option value="Round">Round</option>
                <option value="Oval">Oval</option>
                <option value="Emerald">Emerald</option>
                <option value="Radiant">Radiant</option>
                <option value="Pear">Pear</option>
                <option value="Cushion">Cushion</option>
                <option value="Elongated cushion">Elongated Cushion</option>
                <option value="Elongated hexagon">Elongated Hexagon</option>
                <option value="Marquise">Marquise</option>
                <option value="Princess">Princess</option>
                <option value="Asscher">Asscher</option>
                <option value="Heart">Heart</option>
            </select> 
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Color </label>
            <select class="custom-select rounded-0" name="stone_color" id="stone_color">
              <option value="Pink">Pink</option>
              <option value="Blue">Blue</option>
              <option value="Yellow">Yellow</option>
            </select> 
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Clarity</label>
            <select class="custom-select rounded-0" name="stone_clarity" id="stone_clarity">
              <option value="I1">I1</option>
              <option value="SI2">SI2</option>
              <option value="SI1">SI1</option>
              <option value="VS2">VS2</option>
              <option value="VS1">VS1</option>
              <option value="VVS2">VVS2</option>
              <option value="VVS1">VVS1</option>
              <option value="IF">IF</option>
              <option value="FL">FL</option>
            </select> 
        </div> `;
    } else if (stoneType === 'moissanite') {
      additionalFields.innerHTML = `
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Shape </label>
            <select class="custom-select rounded-0" id="stone_shape_type" name="stone_shape_type">
              <option value="Round">Round</option>
              <option value="Oval">Oval</option>
              <option value="Emerald">Emerald</option>
              <option value="Radiant">Radiant</option>
              <option value="Pear">Pear</option>
              <option value="Cushion">Cushion</option>
              <option value="Elongated Cushion">Elongated Cushion</option>
              <option value="Elongated Hexagon">Elongated Hexagon</option>
              <option value="Marquise">Marquise</option>
              <option value="Princess">Princess</option>
              <option value="Asscher">Asscher</option>
              <option value="Heart">Heart</option>
            </select> 
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Color </label>
            <select class="custom-select rounded-0" id="stone_color" name="stone_color">
              <option value="Colourless">Colourless</option>
              <option value="Clover green">Clover Green</option>
              <option value="Smokey grey">Smokey Grey</option>
              <option value="Sunshine yello">Sunshine Yello</option>
              <option value="Champagne">Champagne</option>
              <option value="Midnight blue">Midnight Blue</option>
              <option value="Seafoam green">Seafoam Green</option>
              <option value="Sandy yellow">Sandy Yellow</option>
            </select> 
        </div>
      `;
    } else if (stoneType === 'sapphire') {
      additionalFields.innerHTML = `
       <div class="col-4 mt-2">
          <label for="exampleSelectRounded0">Shape </label>
          <select class="custom-select rounded-0"  name="stone_shape_type" id="stone_shape_type">
            <option value="Round">Round</option>
            <option value="Oval">Oval</option>
            <option value="Emerald">Emerald</option>
            <option value="Radiant">Radiant</option>
            <option value="Pear">Pear</option>
            <option value="Cushion">Cushion</option>
            <option value="Elongated Cushion">Elongated Cushion</option>
            <option value="Elongated Hexagon">Elongated Hexagon</option>
            <option value="Marquise">Marquise</option>
            <option value="Princess">Princess</option>
            <option value="Asscher">Asscher</option>
            <option value="Heart">Heart</option>
          </select> 
        </div>
        <div class="col-4 mt-2">
            <label for="exampleSelectRounded0">Color </label>
            <select class="custom-select rounded-0" id="stone_color" name="stone_color">
              <option value="Colourless">Colourless</option>
              <option value="Clover green">Clover Green</option>
              <option value="Smokey grey">Smokey Grey</option>
              <option value="Sunshine yello">Sunshine Yello</option>
              <option value="Champagne">Champagne</option>
              <option value="Midnight blue">Midnight Blue</option>
              <option value="Seafoam green">Seafoam Green</option>
              <option value="Sandy yellow">Sandy Yellow</option>
            </select>
           
        </div>
      `;
    }
  }