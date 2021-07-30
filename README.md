# Title: MVC/Twig

- Repository: `mvc-twig-symfony`
- Type of Challenge: `Learning challenge`
- Duration: `2 days`
- Deployment strategy : `NA`
- Team challenge : `solo`

## Project contributors:
- Jonas Rossou

## Learning objectives?
- Install Symfony
- Learn about the lifecycle of software
- Learn to use the MVC layer of Symfony
- Learn to use the routing component
- Learn the basics of twig

## The Mission
We are going to install Symfony, and then make some small pages and functionality using the MVC, Routing and Twig component.

## What did I learn from this exercise
- Basic understanding of the framework Symfony
- The mvc layer of Symfony
- Make my own twig-function
- Form builder and passing that data in Symfony
- Routing in Symfony (path, forward, redirecting etc)
- Nl2br filter
- Twig filters in general

### Must-have features
Add 2 actions to the controller:

showMyName (homepage): On this page you will greet the user by his name. The default name is "Unknown".
Below the greeting there should be a form where the user can save his name. When submitted (POST) this should send the user to the changeMyName page. You will need to change the <form action=""> to the route of the changeMyName() method below.

This page should be the homepage. If you just enter the domain name this should be the page that opens up.

You will need to create a twig file for the view.

changeMyName: You should not be able to go to this URL if the method is not a POST request. Find a way in Symfony to enforce this.
If the user arrives here from the change your name form, save his choice in a $_SESSION variable.

After the form is saved, redirect the user to the showMyName action. This should change the URL.

This method does not require a view, because it immediately redirects the user to the previous page.

It is time to modify the About Me page now, create a link to showMyName. We are not going to hardcode the url, we will use a Twig helper path() to keep our code flexible by using the route name as parameter.

Add a link on the homepage to go to the About Me page.

Add the user his name on the About Me page (like you already have on the homepage).

If the user is on the About Me page without a name the page should forward to the homepage, where he can use the form. The URL should not change this time.

Change the url of the About Me page from "about-me" to "about-becode" in the annotation in your controller. If you did everything correctly the links should still work! Magic!

Add a © Becode in the base template file, this footer should appear on all pages!

in the base.html.twig file add a menu block surrounded by an <aside> tag (make it appear to the left with css).
Inside the menu block add 2 links to the homepage and the about me page.

Let add some content to the new left menu that only appears on the about-me page. Show the current date in 3 different formats in the left menu, but only pass a DateTime object once trough your controller. Because your Controller is in a namespace don't forget to import the DateTime class!

Europe: DMY
America: MDY
China & Japan: YMD
To do this you will need to use the format_date filter. Filters are really flexible, small modifiers you can assign to variables to change their appearance.

You will need a custom pattern for this, one example of this would be {{ date|format_date(pattern="J/M/d") }}.

In order to make this work you might need to install the following extensions:

sudo apt-get install php-http sudo apt-get install php-intl composer require twig/intl-extra

Make sure the 2 links that are as a default in the menu block still appear above your dates, you will need to read about extending a block in order to pull that off.

Now we add some extra functionality on the homepage, in the menu below the default navigation.

Let show his name with each word capitalized, but all the rest in lower case, so "JOHN SMITH" becomes "John Smith".

Sometimes you want to add a piece of custom code on several places in your website, and always passing the same code to your controller can become cumbersome. This is why we can extend with our custom twig functions and filters!

We are going to create a "Random quote generator", you don't need to write the code for the quotes anymore, just copy the quotes.php script. Add a random quote on each page below the current content.

You need a custom TwigFunction to do this, follow the symfony documentation for more information.

Make sure to show the enters (<br>) being displayed in the quotes, don't show a quote on only 1 line. You can do this with the nl2br filter.




