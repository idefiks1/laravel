var casper = require('casper').create({
    verbose: true,
    logLevel: "debug"
});

//casper.start('https://auto.ria.com');
casper.start('https://auto.ria.com/legkovie/volkswagen/golf/');
//casper.start('https://auto.ria.com/search/?category_id=1&marka_id=84&model_id=35449#countpage=10&top=2&power_name=1&category_id=1&marka_id[0]=84&model_id[0]=35449&s_yers[0]=0&po_yers[0]=0&currency=1&engineVolumeFrom=&engineVolumeTo=');

var links;

casper.then(function getLinks()
{
	
    links = this.evaluate(function(){
        var links = document.getElementsByClassName("more");
        links = Array.prototype.map.call(links,function(link)
        {
            return link.getAttribute('href');
        });
        return links;
    });  

});

var fs = require('fs');
var myfile = "/var/www/laravel/laravel/public/js/casperjs/output1.json";
var js = {};
var result = [];
casper.then(function()
{
    this.each(links,function(self,link)
    {
        self.thenOpen(link,function(a)
        {
            this.echo(this.getCurrentUrl());

            var infoLabel = this.evaluate(function()
            {
                var label = document.querySelectorAll('span.label');
               
                return Array.prototype.map.call(label, function(e) 
                {
                    return e.textContent;
                });

            });

            var infoText = this.evaluate(function()
            {
                
                
                var text = document.querySelectorAll('span.argument');
                return Array.prototype.map.call(text, function(e) 
                {
                    return e.textContent;
                });
                
               

            });


            
            
            
            js.url = this.getCurrentUrl();
            js.infoLabel = infoLabel;
            js.infoText = infoText;

            result.push( JSON.stringify(js));
            fs.write(myfile, result, 'w+');

            casper.then(function() 
            {

                var name = link.substr(22,31);
                this.capture("/var/www/laravel/laravel/public/js/casperjs/"+ name +".jpg",
                {
                    top: 100,
                    left: 0,
                    width: 500,
                    height: 300
                });

            });
           

        });

    });

});


casper.run();
