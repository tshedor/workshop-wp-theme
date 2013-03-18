#Workshop Wordpress Theme

This theme was built for a few workshops I led in the Fall of 2012. It uses [Bootstrap](http://twitter.github.com/bootstrap/), [Sass](http://sass-lang.com/)/[Compass](http://compass-style.org/) and [Prism](http://prismjs.com/) primarily, although other open-source projects are in there like [fancybox](http://fancyapps.com/fancybox/) and [Source Sans](http://sourceforge.net/projects/sourcesans.adobe/).

##Shortcodes

* `[example]` - designates an example. Accepts `just_code` (`"true"`, default is `"false"`) and `lang` (`"css"`, `"javascript"` `"none"` default is `"markdown"`) arguments. Code can be unescaped inside the starting and closing tag
* `[warning]` - adds a label before a paragraph. Accepts `bonus=""` to display a green label with "Bonus" or blue label with `tip="TIPNAME"`. Defaults to "Heads up" as a red label. Wrap warning inside `[warning][/warning]`.

##Related

The custom post type adds links to to the sidebar. Add non-heirarchal tags on regular posts and related posts. To adjust the links accordingly to the relevant content, set the ID attribute in a tag to match the name of the Related Tag (on the post), just without spaces, i.e. `<h2 id="CSSColors">CSS Colors</h2>`.

##License

###The MIT License (MIT)
Copyright (c) 2012 Timothy Shedor

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


