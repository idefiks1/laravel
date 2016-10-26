var casper = require('casper').create({
    verbose: true,
    logLevel: "debug"
});


casper.start('https://auto.ria.com/legkovie/volkswagen/golf/');



var links;



casper.then(function getLinks(){
	
    links = this.evaluate(function(){
        var links = document.getElementsByClassName("more");
        links = Array.prototype.map.call(links,function(link){
            return link.getAttribute('href');
        });
        return links;
    });


    

});

var fs = require('fs');
var myfile = "output.txt";


casper.then(function()
{
    this.each(links,function(self,link)
    {
        self.thenOpen(link,function(a)
        {
            this.echo(this.getCurrentUrl());

            var info = this.evaluate(function()
            {
                var texts = document.querySelectorAll('span.argument');
                return Array.prototype.map.call(texts, function(e) {
                    return e.textContent;
                });
            });
            
            
            var js = {};
            js.url = this.getCurrentUrl();
            js.info = info;
            var result = JSON.stringify(js);
          
            fs.write(myfile, result, 'w+');
            casper.then(function() 
            {

                var name = link.substr(22,31);
                this.capture(name +".png");

            });
           
        });

    });

});


casper.run();
