/*function primera(){

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/1_CO_AFAC-01-21R1.pdf').then((pdf) => { 
myState2.pdf = pdf;
render1();
});

function render1() {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf1renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous1').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page1").value = myState2.currentPage;
        render1();
    });

document.getElementById('go_next1').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page1")
                .value = myState2.currentPage;
        render1();
    });

document.getElementById('current_page1').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page1').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page1").value = desiredPage;
                    render1();
            }
        }
    });

document.getElementById('zoom_in1')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render1();
    });

document.getElementById('zoom_out1')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render1();
    });        
}

function segunda(){

i = 2;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+i+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(i);
});

function render(i) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+i+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+i+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+i+"").value = myState2.currentPage;
        render(i);
    });

document.getElementById('go_next'+i+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+i+"")
                .value = myState2.currentPage;
        render(i);
    });

document.getElementById('current_page'+i+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+i+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+i+"").value = desiredPage;
                    render(i);
            }
        }
    });

document.getElementById('zoom_in'+i+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(i);
    });

document.getElementById('zoom_out'+i+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(i);
    });            
}


function tercera(){

l = 3;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+l+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(l);
});

function render(l) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+l+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+l+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+l+"").value = myState2.currentPage;
        render(l);
    });

document.getElementById('go_next'+l+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+l+"")
                .value = myState2.currentPage;
        render(l);
    });

document.getElementById('current_page'+l+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+l+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+l+"").value = desiredPage;
                    render(l);
            }
        }
    });

document.getElementById('zoom_in'+l+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(l);
    });

document.getElementById('zoom_out'+l+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(l);
    });            

}



function cuarta(){

c = 4;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+c+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(c);
});

function render(c) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+c+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+c+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+c+"").value = myState2.currentPage;
        render(c);
    });

document.getElementById('go_next'+c+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+c+"")
                .value = myState2.currentPage;
        render(c);
    });

document.getElementById('current_page'+c+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+c+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+c+"").value = desiredPage;
                    render(c);
            }
        }
    });

document.getElementById('zoom_in'+c+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(c);
    });

document.getElementById('zoom_out'+c+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(c);
    });            

}

function quinta(){

q = 5;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+q+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(q);
});

function render(q) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+q+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+q+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+q+"").value = myState2.currentPage;
        render(q);
    });

document.getElementById('go_next'+q+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+q+"")
                .value = myState2.currentPage;
        render(q);
    });

document.getElementById('current_page'+q+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+q+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+q+"").value = desiredPage;
                    render(q);
            }
        }
    });

document.getElementById('zoom_in'+q+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(q);
    });

document.getElementById('zoom_out'+q+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(q);
    });            

}



function sexto(){

x = 6;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+x+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(x);
});

function render(x) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+x+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+x+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+x+"").value = myState2.currentPage;
        render(x);
    });

document.getElementById('go_next'+x+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+x+"")
                .value = myState2.currentPage;
        render(x);
    });

document.getElementById('current_page'+x+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+x+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+x+"").value = desiredPage;
                    render(x);
            }
        }
    });

document.getElementById('zoom_in'+x+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(x);
    });

document.getElementById('zoom_out'+x+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(x);
    });               
}

function siete(){

t = 7;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+t+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(t);
});

function render(t) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+t+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+t+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+t+"").value = myState2.currentPage;
        render(t);
    });

document.getElementById('go_next'+t+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+t+"")
                .value = myState2.currentPage;
        render(t);
    });

document.getElementById('current_page'+t+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+t+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+t+"").value = desiredPage;
                    render(t);
            }
        }
    });

document.getElementById('zoom_in'+t+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(t);
    });

document.getElementById('zoom_out'+t+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(t);
    });            

}

function octavo(){

h = 8;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+h+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(h);
});

function render(h) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+h+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+h+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+h+"").value = myState2.currentPage;
        render(h);
    });

document.getElementById('go_next'+h+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+h+"")
                .value = myState2.currentPage;
        render(h);
    });

document.getElementById('current_page'+h+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+h+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+h+"").value = desiredPage;
                    render(h);
            }
        }
    });

document.getElementById('zoom_in'+h+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(h);
    });

document.getElementById('zoom_out'+h+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(h);
    });            

}

// ----------------
function novena(){

v = 9;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}*/
// for (var i = 1; i <= 10; i++) {//     alert(i);  // }
// ----------------
function dies(){

let v = 10;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            

}
//---------------------
function once(){

let v = 11;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            

}

// ---------------
function doce(){

let v = 12;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            

}

// ---------------
function trece(){

let v = 13;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            

}

// ---------------
function catorce(){

let v = 14;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            

}

// ---------------
function quince(){

let v = 15;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}

// ---------------
function diesis(){

let v = 16;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ---------------
function diesiscte(){

let v = 17;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ---------------
function diesisoch(){

let v = 18;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}

// ---------------
function diesisnve(){

let v = 19;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ---------------
function veinti(){

let v = 20;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}



// ---------------
function veintiuno(){

let v = 21;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}

// ---------------
function veintidos(){

let v = 22;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}

// ---------------
function veintitres(){

let v = 23;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ---------------
function veinticuatro(){

let v = 24;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ---------------
function veinticinco(){

let v = 25;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ---------------
function veintiseis(){

let v = 26;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


// ------------------------------------------ //
function veintisiete(){

let v = 27;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}

// ------------------------------------------ //

function veintiocho(){

let v = 28;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });            
}


function veitinueve(){
let v = 29;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}

function treinta(){
let v = 30;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}

function trentaiuno(){
let v = 31;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}



function trentaidos(){
let v = 32;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}


function trentaitres(){
let v = 33;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}

function trentaicuatro(){
let v = 34;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}


function trentaicinco(){
let v = 35;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}

function trentaiseis(){
let v = 36;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}


function trentaisiete(){
let v = 37;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}

function trentaiocho(){
let v = 38;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });           
}


function trentainueve(){
let v = 39;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });               
}


function cuarenta(){
let v = 40;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });               
}

function cuarentaiuno(){

let v = 41;

var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  

}


function cuarentaidos(){
let v= 42;
    
    var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cuarentaitres(){
let v= 43;
    
    var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cuarentaicuatro(){
let v= 44;
    
    var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cuarentaicinco(){
let v= 45;
    
    var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cuarentaiseis(){
let v= 46;
    
    var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cuarentaisiete(){
let v= 47;
    
    var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}


function cuarentaiocho(){
    let v = 48;

        var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cuarentainueve(){
    let v = 49;

        var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cincuenta(){
    let v = 50;

        var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cincuentaiuno(){
    let v = 51;

        var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
  canvasContext: ctx,
  viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
                .value = myState2.currentPage;
        render(v);
    });

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
            document.getElementById('current_page'+v+'').valueAsNumber;
                             
            if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
                    myState2.currentPage = desiredPage;
                    document.getElementById("current_page"+v+"").value = desiredPage;
                    render(v);
            }
        }
    });

document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });

document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}
function cincuentaidos(){
let v = 52;
var myState2 = {
pdf: null,
currentPage: 1,
zoom: 1
}

pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
myState2.pdf = pdf;
render(v);
});

function render(v) {
myState2.pdf.getPage(myState2.currentPage).then((page) => {
var canvas = document.getElementById("pdf"+v+"renderer");
var ctx = canvas.getContext('2d');
var viewport = page.getViewport(myState2.zoom);
canvas.width = viewport.width;
canvas.height = viewport.height;
page.render({
canvasContext: ctx,
viewport: viewport
});
});
}
document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
if(myState2.pdf == null || myState2.currentPage == 1) return;
myState2.currentPage -= 1;
document.getElementById("current_page"+v+"").value = myState2.currentPage;
render(v);
});

document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;

myState2.currentPage += 1;
document.getElementById("current_page"+v+"")
.value = myState2.currentPage;
render(v);
});

document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
if(myState2.pdf == null) return;

// Get key code
var code = (e.keyCode ? e.keyCode : e.which);

// If key code matches that of the Enter key
if(code == 13) {
var desiredPage = 
document.getElementById('current_page'+v+'').valueAsNumber;

if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
myState2.currentPage = desiredPage;
document.getElementById("current_page"+v+"").value = desiredPage;
render(v);
}
}
});

document.getElementById('zoom_in'+v+'')
.addEventListener('click', (e) => {
if(myState2.pdf == null) return;
myState2.zoom += 0.3;
render(v);
});

document.getElementById('zoom_out'+v+'')
.addEventListener('click', (e) => {
if(myState2.pdf == null) return;
myState2.zoom -= 0.3;
render(v);
});  
}

function cincuentaitres(){
    let v = 53;
    var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    });  
}


function cincuentaicuatro(){

    let v = 54;
    var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 

}

function cincuentaicinco(){

    let v = 55;
    var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 

}

function cincuentaiseis(){

    let v = 56;
    var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 

}

function cincuentaisiete(){

    let v = 57;
    var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 

}

function cincuentaiocho(){
        let v = 58;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function cincuentainueve(){
        let v = 59;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function sesenta(){
        let v = 60;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function sesentaiuno(){
        let v = 61;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function sesentaidos(){
        let v = 62;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function sesentaitres(){
        let v = 63;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function sesentaicuatro(){
        let v = 64;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
function sesentaicinco(){
        let v = 65;
            var myState2 = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    pdfjsLib.getDocument('doc/'+v+'CIRCULAR.pdf').then((pdf) => { 
        myState2.pdf = pdf;
        render(v);
    });
    function render(v) {
        myState2.pdf.getPage(myState2.currentPage).then((page) => {
            var canvas = document.getElementById("pdf"+v+"renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport(myState2.zoom);
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
    document.getElementById('go_previous'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage == 1) return;
        myState2.currentPage -= 1;
        document.getElementById("current_page"+v+"").value = myState2.currentPage;
        render(v);
    });
    document.getElementById('go_next'+v+'').addEventListener('click', (e) => {
        if(myState2.pdf == null || myState2.currentPage > myState2.pdf._pdfInfo.numPages) return;
        myState2.currentPage += 1;
        document.getElementById("current_page"+v+"")
        .value = myState2.currentPage;
        render(v);
    });
    document.getElementById('current_page'+v+'').addEventListener('keypress', (e) => {
        if(myState2.pdf == null) return;
// Get key code
var code = (e.keyCode ? e.keyCode : e.which);
// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = 
    document.getElementById('current_page'+v+'').valueAsNumber;
    if(desiredPage >= 1 && desiredPage <= myState2.pdf._pdfInfo.numPages) {
        myState2.currentPage = desiredPage;
        document.getElementById("current_page"+v+"").value = desiredPage;
        render(v);
    }
}
});
    document.getElementById('zoom_in'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom += 0.3;
        render(v);
    });
    document.getElementById('zoom_out'+v+'')
    .addEventListener('click', (e) => {
        if(myState2.pdf == null) return;
        myState2.zoom -= 0.3;
        render(v);
    }); 
}
