const init = () =>{
  const $input = document.querySelector(".validate-target");
  $input.addEventListener("input",function(){
      alert("値が変更されました");
  })
  console.log($input);
};

init();