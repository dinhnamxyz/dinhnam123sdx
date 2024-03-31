var search = document.getElementById("searchPosts");

var btnClear =  document.getElementById("btnClear");
btnClear.style.display = "none";

search.addEventListener('input',function()
{

    if (search.value.trim()!=='')
    {
        btnClear.style.display = 'inline-block';
    }else
    {
        btnClear.style.display = 'none';
    }

});


btnClear.addEventListener('click',function()
{
    search.value = '';
    btnClear.style.display ='none';
});



