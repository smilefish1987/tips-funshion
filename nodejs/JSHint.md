#JSHint

JSHint 是一个Javascript的代码质量检查工具，主要用来检查代码质量以及找出一些潜在的代码缺陷，是JSLint的分支提供了更多的可配置选项
 
## 1.Usage:
最简单的使用JSHint的方式是将其作为一个node模块
安装jshint ： $npm install jshint -g

安装完后可以通过命令行的方式来运行，最简单的使用方式检测单个文件如果：
```js
$ jshint myfile.js
myfile.js : line 10 ,col 39,Octal literals are not allowed in strict mode.

1 error
```

##2.规则配置文件
默认的情况下JSHint有一个默认的警告和错误规则的集合，这个规则的集合是可配置的，主要通过两种方式来配置规则：
* a.通过 --config 配置选项+配置文件
* b.使用一个命名为.jshintrc 配置文件 
[JSHint 从当前工作目录找.jshintrc文件，如果没有找到就在当前目录的上级目录找，直到系统的更目录，这种机制允许你一个项目有很多不同的规则配置文件，只需要将他们放在项目的跟目录就行，项目的任何子目录都可以使用这些规则配置文件]

规则配置文件是一个简单的json文件指定JSHint的选项是打开还是关闭。例如：
```js
{
      "undef": true,
      "unused": true
}
```

这个配置文件打开未定义和未使用的变量的警告选项。

##3.其他命令行选项
JSHint支持的其他命令行配置标识：
* a. --reporter  用来指定JSHint检查结果输出的格式
$ jshint --reporter = myreporter.js  myfile.js

这个选项还支持两个预定义的检测报告样式，jslint [兼容jsLint的报告样式]和checkstyle[兼容CheckStyle的xml格式的报告样式]
```js
$ jshint --reporter=checkstyle myfile.js
<?xml version="1.0" encoding="utf-8"?>
<checkstyle version="4.3">
        <file name="myfile.js">
    <error line="10" column="39" severity="error"
      message="Octal literals are not allowed in strict mode."/>
  </file>
</checkstyle>
```
* b. --verbose  在JSHint的输出报告中添加消息码
* c. --show-non-errors  显示JSHint生成的附加数据

```js
$ jshint --show-non-errors myfile.js
myfile.js: line 10, col 39, Octal literals are not allowed in strict mode.

1 error

myfile.js:
  Unused variables:
    foo, bar
```

* d. --extra-ext  指定额外的文件扩展名(默认是.js)
* e. --help  JSHint的使用帮助
* f. --version  显示JSHint的版本

##4.忽略文件
如果你想JSHint在检查的时候忽略某些文件，可以在一个名为 .jshintignore 的文件中添加这些文件[支持正则表达式]，比如：
```js
{
     legacy.js
     somelib/**
     otherlib/*.js
}
```

##5.在js文件配置JSHint的检测规则
除了上面说的两种指定JSHint的方式外，可以直接在js文件中通过注释的方式指定JSHint的规则比如：

```js
/* jshint undef: true, unused: true */
/* jshint strict : true */
```
【每行注释的第一个单词是一个指令，上面两个都是 jshint】
你可以使用单行或多行的注释来配置JSHint. 这些注释是函数域的，也就是说如果你把注释放在函数里面就只对这个函数有效。
注释中可以使用的指令：
* jshint    用来设置JSHint的规则选项 

```js   
    /* jshint strict: true */
```
	  
* jslint     用来设置兼容JSHint的jslint的规则选项    
      
```js
	/* jslint vars: true */
```
	  
*  globals   用来告诉JSHint在其他地方定义的JSHint全局变量，如果值是false（默认值）,JSHint会认为该变量是只读的，并对他使用undef规则选项检查   
      
```js   
  	/* global  MY_LIB : false */
```
	  
   也可以使用黑名单选项来确定在当前文件中没有使用任何的全局变量      
      
```js
	/*  global  -BAD_LIB */
```
	 
*  exported   用来告诉JSHint全局变量在当前文件中定义，但是在其他地方有使用  
     
```js    
	/*  exported  EXPORTED_LIB  */
```
*  members   用来告诉JSHint你打算使用的所有的特性，这条指令已经被启用

##6.JSHint 规则选项
JSHint的规则选项有两类，一类是强制执行的，另一类是非强制执行的。前者使JSHint执行非常严格的检测，后者就是给出以下警告。
###强制规则：
* bitwise    这个选项用来禁止像 ^（异或），|(或)和其他的位运算符，因为位运算在javascrip中是很容易出错的。
* camelcase    这个选项用来强制所有的变量命名要么是camelCase 要么 带下划线的UPPER_CASE
* curly      这个选项强制你在循环语句和条件语句时必须使用大括号。
* eqeqeq    这个选项禁止使用 == 和 != ，偏向于是用 === 和 !==。 (后者比前者更安全)
* forin    这个选项要求使用for in 语句来遍历对象的属性
* immed   这个选项禁止不带圆括号形式的直接函数调用
* indent     这个选项强制指定代码的缩进的宽度
* latedef    这个选项禁止变量在未定义时就使用
* newcap    这个选项要求构造函数的名字的首字母大写。
* noarg      这个选项禁止使用arguments.caller 和 arguments.callee。 
* noempty   这个选项警告你代码中的空块。
* nonew     这个选项禁止使用构造函数的副作用。   比如  new MyConstructor();   很多人喜欢这种去调用构造函数而不把她赋值给一个变量。
* plusplus   这个选项禁止使用一元的自增自检操作符，比如： ++  --
* quotmark   这个选项强制使用在代码中使用一致的引号。
* undef         这个选项禁止使用未明确定义的变量
* unused      这个选项警告你代码中定义了但未使用的变量
* strict       这个选项要求所有的函数遵行严格的 ECMAScript 5 模式
* trailing     这个选项当代码中留下一篇空白时就报错。  
```js
	// This otherwise perfectly valid string will error if
	// there is a whitespace after \
	var str = "Hello \
	World";
```
* maxparams   这个选项设置函数的最大参数个数。
* maxdepth      这个选项设置函数中代码的嵌套层数
* maxstatements   这个选项设置每个函数的最大语句行数
* maxcomplexity    这个选项设置代码的环路复杂度
* maxlen           这个选项设置每行代码的最大字符数

###非强制规则：
* asi         这个选项给出缺少分号的警告
* boss        这个选项给出在预期需要比较运算却给了赋值的时警告 。比如： if(a = 10){}
* debug     当代码中出现debugger 语句时给出警告
* eqnull      当代码中出项 ==null 比较时给出警告
* es5         这个选项告诉JSHint代码使用ECMAScript5语法特性,比如：getters 和 setters
* esnext      这个选项告诉JSHint代码使用ECMAScript6语法特性,比如：const
* evil       当代码中使用eval时给出警告
* expr      这个选项当代码出现了在预期要出现赋值和函数调用的地方出现了普通的表达式时给出警告
* funcscope     这个选项当代码中出现了在控制块里里定义的变量在控制块外面使用了这种情况时给出警告
* globalstrict    当代码中使用了严格的全局模式时给出警告
* iterator        当使用了__iterator__属性时给出警告 
* lastsemic      当代码中缺少分号时，给出警告
* laxbreak       当代码中出现可能不安全的换行时，给出警告
* laxcomma     当代码中出现逗号前置时给出警告，比如：
                   ```js
                    var   obj = {
                         name: 'fish'
                       , handle : 'valueof'
                       , role :  'SW Engineer'
                      };
                   ```
* loopfunc      当代码出现 在循环中函数定义时，给出警告。  
* multistr        当代码出现多行的字符串时，给出警告
* proto          当代码中出现 __proto__属性时，给出警告
* scripturl       当代码中使用了script标签的链接时，给出警告，比如：javascript:.....
* smarttabs      当代码中出现混用tab和spaces，并且spaces用于对齐时，给出警告
* shadow          当代码中出现重复定义变量时，给出警告
* sub             当代码中出现了在可以使用.表达式的时候，使用了[]表达式时，给出警告，比如：person['name'] VS person.name
* supernew       当代码中出现了像：new function(){...} 和 new Object，这种怪异的构造时给出警告。在javascript中这些构造用于单例

```js
					var  singleton = new function(){
                         var  privateVar;
                         
                         this.publicMethod = function(){}
                         this.publicMethod2 = function(){}
                    };
```

* validthis        This option suppresses warnings about possible strict violations when the code is running in strict mode and you use this in a non-constructor function.

###环境相关的规则选项：
这些选项都是流行的javascript库和运行时预置的全局变量
* browser     这个选项定义了现代浏览器预置的变量：从document 和 navigator 到html5的FileReader.[这个选项不能显示像 alert/console这种变量] 
* couch         这个选项定义了CouchDB的预置变量
* devel         这个选项定义了那些像console,alert等用于浅显调试的debug用的变量信息
* dojo          这个选项定义了Dojo Toolkit的预置变量
* jquery        这个选项定义了jQuery的预置变量
* mootools    这个选项定义了mootools框架的预置变量
* node          这个选项定义了node的预置变量
* nonstandard     这个选项定义了非标准但是被广泛采用的全局变量，像:escape 和 unescape
* prototypejs      这个选项定义了prototype框架的预置变量
* rhino            这个选项定义了Rhino 运行时的预置变量
* worker         这个选项定义了当代码运行在一个web worker 运行时的预置变量
* wsh           这个选项定义了Windows Script Host 运行时的预置变量
* yui           这个选项定义了yui框架的预置变量

###继承自JSLint的规则选项：
* nomen    这个选项不允许使用'_'的变量
* onevar      这个选项只允许每个函数使用一个var
* passfail     这个选项使得JSHint在遇到第一个错误或警告时，停止执行
* white        This option make JSHint check your source code against Douglas Crockford's JavaScript coding style. Unfortunately, his “The Good Parts” book aside, the actual rules are not very well documented. 


* 参考文档：http://www.jshint.com/docs/#confused 