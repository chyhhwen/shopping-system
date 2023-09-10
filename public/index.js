var i = -1;
showSlides = ()=>
{
    var slides = document.querySelectorAll(".slide");
    if (i > slides.length)
    {
        i = 1;
    }
    else
    {
        i += 1;
    }
    slides[i].style.display = "block";
    if(setTimeout(showSlides, 2000))
    {
        slides[i].style.display = "none";
        if((i+1) == slides.length)
        {
            i = -1;
        }
        slides[i + 1].style.display = "block";
    }

}
window.onload = () =>
{
    showSlides();
}



