

/*
check if a contains b
*/
function contains(a, b){
  try{
    if(a.length < 0) return false;
    if(a.indexOf(b) > -1 ) return true;
  }catch(e){
    return false;
  }
}

module.exports ={
  contains
}
