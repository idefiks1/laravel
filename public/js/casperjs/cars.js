/*
var casper = require('casper').create();

casper.start('https://auto.ria.com/legkovie/volkswagen/golf/', function() {
    this.echo(this.getTitle());
});


casper.run();
*/
/*
var mysql = require('mysql');
var client = mysql.createClient();
client.host='127.0.0.1';
client.port= '3306';
client.user='root';
client.password='root';
client.database='laravel';

client.end();
*/



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

            casper.then(function() 
            {

                var name = link.substr(22,31);
                this.capture(name +".png");

            });

            fs.write(myfile, info + "\n", 'w+');
            fs.write(myfile, "----------------------------------------------------------------------------------" + "\n", 'w+')
           
        });

    });

});


casper.run();



/*
var casper = require('casper').create();
var url = 'http://instagram.com/';

casper.start(url, function() {
    var js = this.evaluate(function() {
        return document; 
    }); 
    this.echo(js.all[0].outerHTML); 
});
casper.run();
*/