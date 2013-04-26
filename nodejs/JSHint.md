#JSHint

JSHint ��һ��Javascript�Ĵ���������鹤�ߣ���Ҫ���������������Լ��ҳ�һЩǱ�ڵĴ���ȱ�ݣ���JSLint�ķ�֧�ṩ�˸���Ŀ�����ѡ��
 
## 1.Usage:
��򵥵�ʹ��JSHint�ķ�ʽ�ǽ�����Ϊһ��nodeģ��
��װjshint �� $npm install jshint -g

��װ������ͨ�������еķ�ʽ�����У���򵥵�ʹ�÷�ʽ��ⵥ���ļ������
```js
$ jshint myfile.js
myfile.js : line 10 ,col 39,Octal literals are not allowed in strict mode.

1 error
```

##2.���������ļ�
Ĭ�ϵ������JSHint��һ��Ĭ�ϵľ���ʹ������ļ��ϣ��������ļ����ǿ����õģ���Ҫͨ�����ַ�ʽ�����ù���
* a.ͨ�� --config ����ѡ��+�����ļ�
* b.ʹ��һ������Ϊ.jshintrc �����ļ� 
[JSHint �ӵ�ǰ����Ŀ¼��.jshintrc�ļ������û���ҵ����ڵ�ǰĿ¼���ϼ�Ŀ¼�ң�ֱ��ϵͳ�ĸ�Ŀ¼�����ֻ���������һ����Ŀ�кܶ಻ͬ�Ĺ��������ļ���ֻ��Ҫ�����Ƿ�����Ŀ�ĸ�Ŀ¼���У���Ŀ���κ���Ŀ¼������ʹ����Щ���������ļ�]

���������ļ���һ���򵥵�json�ļ�ָ��JSHint��ѡ���Ǵ򿪻��ǹرա����磺
```js
{
      "undef": true,
      "unused": true
}
```

��������ļ���δ�����δʹ�õı����ľ���ѡ�

##3.����������ѡ��
JSHint֧�ֵ��������������ñ�ʶ��
* a. --reporter  ����ָ��JSHint���������ĸ�ʽ
$ jshint --reporter = myreporter.js  myfile.js

���ѡ�֧������Ԥ����ļ�ⱨ����ʽ��jslint [����jsLint�ı�����ʽ]��checkstyle[����CheckStyle��xml��ʽ�ı�����ʽ]
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
* b. --verbose  ��JSHint����������������Ϣ��
* c. --show-non-errors  ��ʾJSHint���ɵĸ�������

```js
$ jshint --show-non-errors myfile.js
myfile.js: line 10, col 39, Octal literals are not allowed in strict mode.

1 error

myfile.js:
  Unused variables:
    foo, bar
```

* d. --extra-ext  ָ��������ļ���չ��(Ĭ����.js)
* e. --help  JSHint��ʹ�ð���
* f. --version  ��ʾJSHint�İ汾

##4.�����ļ�
�������JSHint�ڼ���ʱ�����ĳЩ�ļ���������һ����Ϊ .jshintignore ���ļ��������Щ�ļ�[֧��������ʽ]�����磺
```js
{
     legacy.js
     somelib/**
     otherlib/*.js
}
```

##5.��js�ļ�����JSHint�ļ�����
��������˵������ָ��JSHint�ķ�ʽ�⣬����ֱ����js�ļ���ͨ��ע�͵ķ�ʽָ��JSHint�Ĺ�����磺

```js
/* jshint undef: true, unused: true */
/* jshint strict : true */
```
��ÿ��ע�͵ĵ�һ��������һ��ָ������������� jshint��
�����ʹ�õ��л���е�ע��������JSHint. ��Щע���Ǻ�����ģ�Ҳ����˵������ע�ͷ��ں��������ֻ�����������Ч��
ע���п���ʹ�õ�ָ�
* jshint    ��������JSHint�Ĺ���ѡ�� 

```js   
    /* jshint strict: true */
```
	  
* jslint     �������ü���JSHint��jslint�Ĺ���ѡ��    
      
```js
	/* jslint vars: true */
```
	  
*  globals   ��������JSHint�������ط������JSHintȫ�ֱ��������ֵ��false��Ĭ��ֵ��,JSHint����Ϊ�ñ�����ֻ���ģ�������ʹ��undef����ѡ����   
      
```js   
  	/* global  MY_LIB : false */
```
	  
   Ҳ����ʹ�ú�����ѡ����ȷ���ڵ�ǰ�ļ���û��ʹ���κε�ȫ�ֱ���      
      
```js
	/*  global  -BAD_LIB */
```
	 
*  exported   ��������JSHintȫ�ֱ����ڵ�ǰ�ļ��ж��壬�����������ط���ʹ��  
     
```js    
	/*  exported  EXPORTED_LIB  */
```
*  members   ��������JSHint�����ʹ�õ����е����ԣ�����ָ���Ѿ�������

##6.JSHint ����ѡ��
JSHint�Ĺ���ѡ�������࣬һ����ǿ��ִ�еģ���һ���Ƿ�ǿ��ִ�еġ�ǰ��ʹJSHintִ�зǳ��ϸ�ļ�⣬���߾��Ǹ������¾��档
###ǿ�ƹ���
* bitwise    ���ѡ��������ֹ�� ^����򣩣�|(��)��������λ���������Ϊλ������javascrip���Ǻ����׳���ġ�
* camelcase    ���ѡ������ǿ�����еı�������Ҫô��camelCase Ҫô ���»��ߵ�UPPER_CASE
* curly      ���ѡ��ǿ������ѭ�������������ʱ����ʹ�ô����š�
* eqeqeq    ���ѡ���ֹʹ�� == �� != ��ƫ�������� === �� !==�� (���߱�ǰ�߸���ȫ)
* forin    ���ѡ��Ҫ��ʹ��for in ������������������
* immed   ���ѡ���ֹ����Բ������ʽ��ֱ�Ӻ�������
* indent     ���ѡ��ǿ��ָ������������Ŀ��
* latedef    ���ѡ���ֹ������δ����ʱ��ʹ��
* newcap    ���ѡ��Ҫ���캯�������ֵ�����ĸ��д��
* noarg      ���ѡ���ֹʹ��arguments.caller �� arguments.callee�� 
* noempty   ���ѡ���������еĿտ顣
* nonew     ���ѡ���ֹʹ�ù��캯���ĸ����á�   ����  new MyConstructor();   �ܶ���ϲ������ȥ���ù��캯������������ֵ��һ��������
* plusplus   ���ѡ���ֹʹ��һԪ�������Լ�����������磺 ++  --
* quotmark   ���ѡ��ǿ��ʹ���ڴ�����ʹ��һ�µ����š�
* undef         ���ѡ���ֹʹ��δ��ȷ����ı���
* unused      ���ѡ���������ж����˵�δʹ�õı���
* strict       ���ѡ��Ҫ�����еĺ��������ϸ�� ECMAScript 5 ģʽ
* trailing     ���ѡ�����������һƪ�հ�ʱ�ͱ���  
```js
	// This otherwise perfectly valid string will error if
	// there is a whitespace after \
	var str = "Hello \
	World";
```
* maxparams   ���ѡ�����ú�����������������
* maxdepth      ���ѡ�����ú����д����Ƕ�ײ���
* maxstatements   ���ѡ������ÿ������������������
* maxcomplexity    ���ѡ�����ô���Ļ�·���Ӷ�
* maxlen           ���ѡ������ÿ�д��������ַ���

###��ǿ�ƹ���
* asi         ���ѡ�����ȱ�ٷֺŵľ���
* boss        ���ѡ�������Ԥ����Ҫ�Ƚ�����ȴ���˸�ֵ��ʱ���� �����磺 if(a = 10){}
* debug     �������г���debugger ���ʱ��������
* eqnull      �������г��� ==null �Ƚ�ʱ��������
* es5         ���ѡ�����JSHint����ʹ��ECMAScript5�﷨����,���磺getters �� setters
* esnext      ���ѡ�����JSHint����ʹ��ECMAScript6�﷨����,���磺const
* evil       ��������ʹ��evalʱ��������
* expr      ���ѡ������������Ԥ��Ҫ���ָ�ֵ�ͺ������õĵط���������ͨ�ı��ʽʱ��������
* funcscope     ���ѡ������г������ڿ��ƿ����ﶨ��ı����ڿ��ƿ�����ʹ�����������ʱ��������
* globalstrict    ��������ʹ�����ϸ��ȫ��ģʽʱ��������
* iterator        ��ʹ����__iterator__����ʱ�������� 
* lastsemic      ��������ȱ�ٷֺ�ʱ����������
* laxbreak       �������г��ֿ��ܲ���ȫ�Ļ���ʱ����������
* laxcomma     �������г��ֶ���ǰ��ʱ�������棬���磺
                   ```js
                    var   obj = {
                         name: 'fish'
                       , handle : 'valueof'
                       , role :  'SW Engineer'
                      };
                   ```
* loopfunc      ��������� ��ѭ���к�������ʱ���������档  
* multistr        ��������ֶ��е��ַ���ʱ����������
* proto          �������г��� __proto__����ʱ����������
* scripturl       ��������ʹ����script��ǩ������ʱ���������棬���磺javascript:.....
* smarttabs      �������г��ֻ���tab��spaces������spaces���ڶ���ʱ����������
* shadow          �������г����ظ��������ʱ����������
* sub             �������г������ڿ���ʹ��.���ʽ��ʱ��ʹ����[]���ʽʱ���������棬���磺person['name'] VS person.name
* supernew       �������г�������new function(){...} �� new Object�����ֹ���Ĺ���ʱ�������档��javascript����Щ�������ڵ���

```js
					var  singleton = new function(){
                         var  privateVar;
                         
                         this.publicMethod = function(){}
                         this.publicMethod2 = function(){}
                    };
```

* validthis        This option suppresses warnings about possible strict violations when the code is running in strict mode and you use this in a non-constructor function.

###������صĹ���ѡ�
��Щѡ������е�javascript�������ʱԤ�õ�ȫ�ֱ���
* browser     ���ѡ������ִ������Ԥ�õı�������document �� navigator ��html5��FileReader.[���ѡ�����ʾ�� alert/console���ֱ���] 
* couch         ���ѡ�����CouchDB��Ԥ�ñ���
* devel         ���ѡ�������Щ��console,alert������ǳ�Ե��Ե�debug�õı�����Ϣ
* dojo          ���ѡ�����Dojo Toolkit��Ԥ�ñ���
* jquery        ���ѡ�����jQuery��Ԥ�ñ���
* mootools    ���ѡ�����mootools��ܵ�Ԥ�ñ���
* node          ���ѡ�����node��Ԥ�ñ���
* nonstandard     ���ѡ����˷Ǳ�׼���Ǳ��㷺���õ�ȫ�ֱ�������:escape �� unescape
* prototypejs      ���ѡ�����prototype��ܵ�Ԥ�ñ���
* rhino            ���ѡ�����Rhino ����ʱ��Ԥ�ñ���
* worker         ���ѡ����˵�����������һ��web worker ����ʱ��Ԥ�ñ���
* wsh           ���ѡ�����Windows Script Host ����ʱ��Ԥ�ñ���
* yui           ���ѡ�����yui��ܵ�Ԥ�ñ���

###�̳���JSLint�Ĺ���ѡ�
* nomen    ���ѡ�����ʹ��'_'�ı���
* onevar      ���ѡ��ֻ����ÿ������ʹ��һ��var
* passfail     ���ѡ��ʹ��JSHint��������һ������򾯸�ʱ��ִֹͣ��
* white        This option make JSHint check your source code against Douglas Crockford's JavaScript coding style. Unfortunately, his ��The Good Parts�� book aside, the actual rules are not very well documented. 


* �ο��ĵ���http://www.jshint.com/docs/#confused 