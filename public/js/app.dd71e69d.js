(function(t){function e(e){for(var a,r,c=e[0],o=e[1],l=e[2],u=0,p=[];u<c.length;u++)r=c[u],Object.prototype.hasOwnProperty.call(s,r)&&s[r]&&p.push(s[r][0]),s[r]=0;for(a in o)Object.prototype.hasOwnProperty.call(o,a)&&(t[a]=o[a]);d&&d(e);while(p.length)p.shift()();return n.push.apply(n,l||[]),i()}function i(){for(var t,e=0;e<n.length;e++){for(var i=n[e],a=!0,c=1;c<i.length;c++){var o=i[c];0!==s[o]&&(a=!1)}a&&(n.splice(e--,1),t=r(r.s=i[0]))}return t}var a={},s={app:0},n=[];function r(e){if(a[e])return a[e].exports;var i=a[e]={i:e,l:!1,exports:{}};return t[e].call(i.exports,i,i.exports,r),i.l=!0,i.exports}r.m=t,r.c=a,r.d=function(t,e,i){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},r.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(r.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)r.d(i,a,function(e){return t[e]}.bind(null,a));return i},r.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="/";var c=window["webpackJsonp"]=window["webpackJsonp"]||[],o=c.push.bind(c);c.push=e,c=c.slice();for(var l=0;l<c.length;l++)e(c[l]);var d=o;n.push([0,"chunk-vendors"]),i()})({0:function(t,e,i){t.exports=i("56d7")},"034f":function(t,e,i){"use strict";i("85ec")},"0b1c":function(t,e,i){},"276e":function(t,e,i){"use strict";i("3bc4")},3788:function(t,e,i){},"3bc4":function(t,e,i){},"40a2":function(t,e,i){},"56d7":function(t,e,i){"use strict";i.r(e);i("e260"),i("e6cf"),i("cca6"),i("a79d");var a=i("2b0e"),s=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-app",{attrs:{id:"app"}},[i("step-baner"),i("transition",{attrs:{name:"fade",mode:"out-in"}},[i("router-view")],1)],1)},n=[],r=i("5530"),c=function(){var t=this,e=t.$createElement,i=t._self._c||e;return t.editable?i("div",{staticClass:"w-100 overflow-hidden bg-light"},[i("div",{staticClass:"top-space"}),i("v-carousel",{attrs:{height:"160",light:"","show-arrows":!1,touchless:"","hide-delimiters":""},model:{value:t.sliderModel,callback:function(e){t.sliderModel=e},expression:"sliderModel"}},t._l(t.steps,(function(e,a){return i("v-carousel-item",{key:a},[i("section",{staticClass:"w-100 relative items-center h-100 "},[i("div",{staticClass:"flex h-100 items-center section-wrap center ph3 w-100 w-90-l relative"},[i("div",{staticClass:"absolute slide-back"},[i("v-btn",{attrs:{icon:"",color:"primary","x-large":"",height:"64",width:"64",title:"Wróć do poprzedniego kroku",disabled:0==t.currentSlide},on:{click:t.prevSlide}},[i("v-icon",[t._v("mdi-arrow-left")])],1)],1),i("div",{staticClass:"pr5"},[i("span",{staticClass:"f-www f-subheadline fw7",class:"c-"+(a+1),domProps:{textContent:t._s(a<5?a+1:5)}})]),i("div",{staticClass:"c-dark flex-grow-1 f-www"},[i("div",{staticClass:"f3 fw7 mb2"},[t._v(t._s(e.subtitle))]),i("div",[t._v(t._s(e.content))])]),t.currentSlide<5?i("div",{staticClass:"pt0 pl6"},[i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var a=e.hover;return[i("v-btn",{staticClass:"xxxl white--text",attrs:{elevation:a?6:0,rounded:"",color:t.steps[t.currentSlide+1]?t.steps[t.currentSlide+1].color:"primary",depressed:"",disabled:t.possibleStep<=t.currentSlide},on:{click:function(e){return t.nextSlide()}}},[t._v(" Dalej ")])]}}],null,!0)})],1):t._e()])])])})),1)],1):i("div",{staticClass:"top-space-half"})},o=[],l=i("2f62"),d={data:function(){return{sliderModel:0}},computed:Object(r["a"])({},Object(l["c"])("scenarios",["id","title","steps","currentStep","currentSlide","possibleStep","editable","loading"])),watch:{currentSlide:function(t){t!=this.sliderModel&&(this.sliderModel=t)}},methods:Object(r["a"])(Object(r["a"])({},Object(l["d"])("scenarios",["setCurrentStep","setCurrentSlide"])),{},{prevSlide:function(){var t=this.currentSlide-1;this.setCurrentSlide(t),4==t?this.$router.push("/tematy/"+this.id):5==t&&this.$router.push("/tematy/"+this.id+"/scenariusze")},nextSlide:function(){var t=this.currentSlide+1;5==t?this.$router.push("/tematy/"+this.id+"/scenariusze"):(t>this.currentStep&&this.setCurrentStep(t),this.setCurrentSlide(t))}})},u=d,p=i("2877"),f=i("6544"),v=i.n(f),h=i("8336"),w=i("5e66"),b=i("3e35"),y=i("ce87"),m=i("132d"),C=Object(p["a"])(u,c,o,!1,null,null,null),g=C.exports;v()(C,{VBtn:h["a"],VCarousel:w["a"],VCarouselItem:b["a"],VHover:y["a"],VIcon:m["a"]});var _={components:{StepBaner:g},data:function(){return{}},computed:Object(r["a"])({},Object(l["c"])("scenarios",["id"])),mounted:function(){var t=this,e=document.getElementById("topic").dataset["id"];e&&(this.setId(e),this.getTopic(e).then((function(){t.setup()})))},methods:Object(r["a"])(Object(r["a"])({},Object(l["b"])("scenarios",["setup","getTopic"])),Object(l["d"])("scenarios",["setId"]))},k=_,x=(i("034f"),i("7496")),S=Object(p["a"])(k,s,n,!1,null,null,null),j=S.exports;v()(S,{VApp:x["a"]});i("4de4"),i("7db0"),i("c975"),i("4160"),i("d3b7"),i("159b");function F(){return{error:{code:"0"}}}var z="/api",O={getTopic:function(t){return fetch(z+"/topic/"+t+"?t="+(new Date).getTime(),{method:"GET"}).then((function(t){return t.json()})).then((function(t){return t})).catch((function(){return F()}))},updateFactor:function(t){var e=new FormData;return e.append("id",t.id),e.append("id_topic",t.id_topic),e.append("title",t.title),e.append("type",t.type),e.append("key_factor",t.key_factor),e.append("ord",t.ord),fetch(z+"/update_factor?t="+(new Date).getTime(),{method:"POST",body:e}).then((function(t){return t.json()})).catch((function(){return F()}))},deleteFactor:function(t){var e=new FormData;return e.append("id",t.id),e.append("id_topic",t.id_topic),fetch(z+"/delete_factor?t="+(new Date).getTime(),{method:"POST",body:e}).then((function(t){return t.json()})).catch((function(){return F()}))},updateKeyFactors:function(t){var e=t.id_topic,i=t.keyFactorsId,a=new FormData;return a.append("id_topic",e),i.forEach((function(t){return a.append("id[]",t)})),fetch(z+"/update_key_factors?t="+(new Date).getTime(),{method:"POST",body:a}).then((function(t){return t.json()})).catch((function(){return F()}))},updateScenario:function(t){var e=new FormData;return e.append("id",t.id),e.append("id_topic",t.id_topic),e.append("title",t.title),e.append("content",t.content),e.append("ord",t.ord),e.append("factors",t.factors),fetch(z+"/update_scenario?t="+(new Date).getTime(),{method:"POST",body:e}).then((function(t){return t.json()})).catch((function(){return F()}))}},T=function(){return{id:{},one:{id:1,title:"",factors:[],scenarios:[],editable:0},steps:[{title:"Czynniki zmian",subtitle:"Dodaj czynniki zmian",content:"Przyczyny mające wpływ na badane zagadnienie. Przykładowe czynniki: potencjał kadrowy, aktywności organizacji proekologicznych, infrastruktura badawcza, polityka innowacyjna państwa etc. Czynniki zmian mogą być społeczne, technologiczne, prawne, środowiskowe, ekonomiczne.",color:"#f9c814"},{title:"Czynniki kluczowe",subtitle:"Wybierz dwa czynniki kluczowe",content:"Czynniki zmian w otoczeniu zewnętrznym i wewnętrznym badanego obszaru, które w największym stopniu wpłyną na perspektywy jego rozwoju. Są to ważne zagadnienia, ​stanowiące wyzwania wymagające podjęcia odpowiednich działań, które mają istotny wpływ na rozwiązanie problemów wynikających z oceny aktualnego stanu.",color:"#db2f89"},{title:"Siły napędowe",subtitle:"Dodaj siły napędowe",content:"Dodaj siły napędowe charkteryzujące się największą niepewnością i wpływem na zagadnienie.",color:"#00bcda"},{title:"Wild cards",subtitle:"Dodaj wild cards",content:"Dodaj dziekie karty charakteryzujące się niskim prawdopodobieństwem i dużym wpływem na zagadnienie.",color:"#18b9a7"},{title:"Scenariusze",subtitle:"Przejdź do scenariuszy",content:"Twoim zadaniem będzie opracowanie scenariuszy rozwoju sytuacji.",color:"#231f20"},{title:"Scenariusze",subtitle:"Scenariusze",content:"Opracuj 4 możliwe scenariusze rozwoju sytuacji.",color:"#231f20"},{title:"Scenariusz",subtitle:"Scenariusz",content:"Pomyśl o kreatywnej nazwie dla scenariusza. Dodaj kluczowe trendy i siły napędowe wpływające na scenariusz.",color:"#231f20"}],currentStep:0,currentSlide:0,loading:!1}},L={id:function(t){return t.id},factorsByType:function(t){return function(e){return t.one.factors?t.one.factors.filter((function(t){return t.type==e})):[]}},keyFactors:function(t){return t.one.factors?t.one.factors.filter((function(t){return"1"==t.key_factor})):[]},notKeyFactors:function(t){return t.one.factors.filter((function(t){return"1"==t.type&&"1"!=t.key_factor}))||[]},findFactorsMultiple:function(t){return function(e){return t.one.factors.filter((function(t){return-1!=e.indexOf(t.id)}))}},factors:function(t,e){return e.factorsByType(1)},factorsLength:function(t,e){return e.factors.length},keyFactorsLength:function(t,e){return e.keyFactors.length},forces:function(t,e){return e.factorsByType(3)},forcesLength:function(t,e){return e.forces.length},wildcards:function(t,e){return e.factorsByType(4)},wildcardsLength:function(t,e){return e.wildcards.length},editable:function(t){return"1"==t.one.editable},loading:function(t){return t.loading},steps:function(t){return t.steps},title:function(t){return t.one.title},currentSlide:function(t){return t.currentSlide},currentStep:function(t){return t.currentStep},possibleStep:function(t,e){return e.keyFactorsLength>1?5:e.factorsLength>1?1:0},notTakenStep:function(t,e){return e.wildcardsLength>0?4:e.forcesLength>0?3:e.keyFactorsLength>1?2:e.factorsLength>1?1:0},scenarioByNr:function(t){return function(e){return t.one.scenarios.find((function(t){return t.ord==e}))||{}}}},V={setId:function(t,e){t.id=e},insertFactor:function(t,e){t.one.factors.push(e)},setAll:function(t,e){t.all=e},setOne:function(t,e){t.one=e},setLoading:function(t,e){t.loading=e},setStepSlide:function(t,e){t.stepSlide=e},setListener:function(t,e){t.listener=e},setCurrentSlide:function(t,e){t.currentSlide=e},setCurrentStep:function(t,e){t.currentStep=e}},B={getTopic:function(t,e){var i=t.commit;return i("setLoading",!0),O.getTopic(e).then((function(t){return i("setOne",t),i("setLoading",!1),t}))},updateFactor:function(t,e){var i=t.commit,a=t.dispatch;return O.updateFactor(e).then((function(t){return i("setOne",t),a("setup"),t}))},deleteFactor:function(t,e){var i=t.commit,a=t.dispatch;return O.deleteFactor(e).then((function(t){return i("setOne",t),a("setup"),t}))},updateKeyFactors:function(t,e){var i=t.commit,a=t.dispatch;return O.updateKeyFactors(e).then((function(t){return i("setOne",t),a("setup"),t}))},updateScenario:function(t,e){var i=t.commit;return O.updateScenario(e).then((function(t){return i("setOne",t),t}))},setup:function(t){var e=t.commit,i=t.getters,a=i.notTakenStep;i.editable||a>1&&(a=4),e("setCurrentStep",a),e("setCurrentSlide",a)}},P={namespaced:!0,state:T,getters:L,actions:B,mutations:V};a["a"].use(l["a"]);var E=new l["a"].Store({state:{},mutations:{},actions:{},modules:{scenarios:P}}),D=i("f309");a["a"].use(D["a"]);var M=new D["a"]({theme:{themes:{light:{primary:"#231f20",secondary:"#FFCDD2",accent:"#3F51B5"}}}}),K=i("8c4f"),N=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-100 overflow-hidden"},[i("section",[i("div",{staticClass:"section-wrap center ph3 w-100 w-90-l tc"},[i("h1",{staticClass:"c-dark fw7 mv6 f3 f2-m f1-l w-100 w-70-l lh-solid center"},[t._v(t._s(t.title))])])]),this.loading?i("section",{staticClass:"pv3 tc"},[i("v-progress-circular",{attrs:{size:566,width:8,color:"#C9C9C9",indeterminate:""}})],1):i("section",{staticClass:"diagram"},[i("div",{staticClass:"section-wrap center ph3 w-100 w-90-l"},[i("div",{staticClass:"flex flex-wrap w-100"},[i("div",{staticClass:"w-50"},[i("div",{staticClass:"w-100 flex flex-wrap"},[i("div",{staticClass:"w-third flex flex-column justify-center di-le"},t._l(t.keyFactors,(function(e,a){return i("div",{key:a,staticClass:"chip-wrap",class:[t.nodeClass(a,t.keyFactorsLength)]},[i("v-chip",{staticClass:"tc rounded-lg",attrs:{label:"",link:"",color:t.steps[1].color,"text-color":"white"}},[t._v(t._s(e.title))])],1)})),0),i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-third flex items-end"},[i("div",{staticClass:"w-100 pv7 relative z-1",class:{"di-step-2":t.keyFactorsLength>0}},[t.editable?i("v-dialog",{attrs:{scrollable:"",persistent:"","max-width":"600px"},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on;return[i("div",{staticClass:"relative btc"},[1==t.currentSlide?i("div",{staticClass:"pulse-bg chip2"}):t._e(),i("v-tooltip",{attrs:{top:"","max-width":"400",color:t.steps[1].color},scopedSlots:t._u([{key:"activator",fn:function(e){var s=e.on;return[i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var n=e.hover;return[i("v-btn",t._g({staticClass:"rounded-lg",class:{"white--text":t.currentStep>0},attrs:{block:"",height:"64",elevation:n?8:0,outlined:!(t.currentStep>0),color:t.steps[1].color,disabled:t.currentStep<1}},Object.assign({},s,a)),[t._v(" "+t._s(t.steps[1].title)+" ")])]}}],null,!0)})]}}],null,!0)},[i("span",{domProps:{textContent:t._s(t.steps[1].content)}})])],1)]}}],null,!1,2609533443),model:{value:t.dialogKey,callback:function(e){t.dialogKey=e},expression:"dialogKey"}},[i("v-card",[i("v-card-title",[t._v("Wybierz 2 czynniki kluczowe")]),i("v-divider"),i("v-card-text",{staticClass:"mt3"},[i("v-chip-group",{attrs:{column:"",multiple:"","active-class":"chip2"},model:{value:t.keyFactorsSelection,callback:function(e){t.keyFactorsSelection=e},expression:"keyFactorsSelection"}},t._l(t.factors,(function(e,a){return i("v-chip",{key:a,staticClass:"rounded-lg",attrs:{filter:"",label:"",value:e.id,disabled:t.keyFactorsSelectionLength>=2&&!t.keyFactorsSelection.includes(e.id)}},[t._v(" "+t._s(e.title)+" ")])})),1)],1),i("v-divider"),i("v-card-actions",[i("v-spacer"),i("v-btn",{attrs:{text:""},on:{click:function(e){t.dialogKey=!1}}},[t._v(" Anuluj ")]),i("v-btn",{attrs:{text:""},on:{click:t.saveKeyFactors}},[t._v(" Zapisz ")])],1)],1)],1):i("div",{staticClass:"relative btc"},[1==t.currentSlide?i("div",{staticClass:"pulse-bg chip2"}):t._e(),i("v-tooltip",{attrs:{top:"","max-width":"400",color:t.steps[1].color},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,s=e.attrs;return[i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var n=e.hover;return[i("v-btn",t._g(t._b({staticClass:"rounded-lg",class:{"white--text":t.currentStep>0},attrs:{block:"",height:"64",elevation:n?8:0,outlined:!(t.currentStep>0),color:t.steps[1].color,disabled:t.currentStep<1}},"v-btn",s,!1),a),[t._v(" "+t._s(t.steps[1].title)+" ")])]}}],null,!0)})]}}])},[i("span",{domProps:{textContent:t._s(t.steps[1].content)}})])],1),t.editable?i("v-btn",{staticClass:"indicator-2",attrs:{fab:"",rounded:"",elevation:"0"},on:{click:function(e){t.currentStep>1&&t.setCurrentSlide(1)}}},[t._v("2")]):t._e(),i("div",{staticClass:"triangle-down"})],1)]),i("div",{staticClass:"w-2"})])]),i("div",{staticClass:"w-50"},[i("div",{staticClass:"w-100 flex flex-wrap"},[i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-third flex items-end"},[i("div",{staticClass:"w-100 pv7 relative z-1",class:{"di-step-3":t.forcesLength>0}},[i("div",{staticClass:"relative btc"},[2==t.currentSlide?i("div",{staticClass:"pulse-bg chip3"}):t._e(),i("v-tooltip",{attrs:{top:"","max-width":"400",color:t.steps[2].color},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,s=e.attrs;return[i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var n=e.hover;return[i("v-btn",t._g(t._b({staticClass:"rounded-lg",class:{"white--text":t.currentStep>1},attrs:{block:"",height:"64",elevation:n?8:0,outlined:!(t.currentStep>1),color:t.steps[2].color,disabled:t.currentStep<2},on:{click:function(e){e.stopPropagation(),t.editable&&t.addFactor(3)}}},"v-btn",s,!1),a),[t._v(" "+t._s(t.steps[2].title)+" ")])]}}],null,!0)})]}}])},[i("span",{domProps:{textContent:t._s(t.steps[2].content)}})])],1),t.editable?i("v-btn",{staticClass:"indicator-3",attrs:{fab:"",rounded:"",elevation:"0"},on:{click:function(e){t.currentStep>2&&t.setCurrentSlide(2)}}},[t._v("3")]):t._e(),i("div",{staticClass:"triangle-down"})],1)]),i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-third flex flex-column justify-center di-r"},t._l(t.forces,(function(e,a){return i("div",{key:a,staticClass:"chip-wrap",class:[t.nodeClass(a,t.forcesLength)]},[i("v-chip",{staticClass:"tc rounded-lg",attrs:{label:"",link:"",color:t.steps[2].color,"text-color":"white"},on:{click:function(i){i.stopPropagation(),t.editable&&t.editFactor(e)}}},[t._v(t._s(e.title))])],1)})),0)])])]),i("div",{staticClass:"flex flex-wrap w-100"},[i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-1"}),i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-2 relative di-step-5"},[t.editable?i("v-btn",{staticClass:"indicator-5 z-0",attrs:{fab:"",rounded:"",elevation:"0"}},[t._v("5")]):t._e(),i("div",{staticClass:"relative"},[4==t.currentSlide?i("div",{staticClass:"pulse-bg chip4"}):t._e(),i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var a=e.hover;return[i("v-btn",{staticClass:"rounded-lg z1",class:{"white--text":t.currentStep>2},attrs:{block:"",height:"64",elevation:a?8:0,outlined:!(t.currentStep>2),color:t.steps[4].color,disabled:t.currentStep<3},on:{click:t.goToScenarios}},[t._v(" Scenariusze ")])]}}])})],1)],1),i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-1"}),i("div",{staticClass:"w-2"})]),i("div",{staticClass:"flex flex-wrap w-100"},[i("div",{staticClass:"w-50"},[i("div",{staticClass:"w-100 flex flex-wrap"},[i("div",{staticClass:"w-third flex flex-column justify-center di-le relative z-1"},t._l(t.factors,(function(e,a){return i("div",{key:a,staticClass:"chip-wrap",class:[t.nodeClass(a,t.factorsLength)]},[i("v-chip",{staticClass:"tc rounded-lg",attrs:{label:"",link:"",color:t.steps[0].color,"text-color":"white"},on:{click:function(i){i.stopPropagation(),t.editable&&t.editFactor(e)}}},[t._v(t._s(e.title))])],1)})),0),i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-third flex items-start"},[i("div",{staticClass:"w-100 pv7 relative pulse-container",class:{"di-step-1":t.factorsLength>0}},[i("div",{staticClass:"relative btc"},[0==t.currentSlide?i("div",{staticClass:"pulse-bg chip1"}):t._e(),i("v-tooltip",{attrs:{top:"","max-width":"400",color:t.steps[0].color},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,s=e.attrs;return[i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var n=e.hover;return[i("v-btn",t._g(t._b({staticClass:"white--text rounded-lg",attrs:{block:"",height:"64",elevation:n?8:0,color:t.steps[0].color},on:{click:function(e){e.stopPropagation(),t.editable&&t.addFactor(1)}}},"v-btn",s,!1),a),[t._v(" "+t._s(t.steps[0].title)+" ")])]}}],null,!0)})]}}])},[i("span",{domProps:{textContent:t._s(t.steps[0].content)}})])],1),t.editable?i("v-btn",{staticClass:"indicator-1",attrs:{fab:"",rounded:"",elevation:"0"},on:{click:function(e){return t.setCurrentSlide(0)}}},[t._v("1")]):t._e(),i("div",{staticClass:"triangle-up"})],1)]),i("div",{staticClass:"w-2"})])]),i("div",{staticClass:"w-50"},[i("div",{staticClass:"w-100 flex flex-wrap"},[i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-third flex items-start"},[i("div",{staticClass:"w-100 pv7 relative",class:{"di-step-4":t.wildcardsLength>0}},[i("div",{staticClass:"relative btc"},[3==t.currentSlide?i("div",{staticClass:"pulse-bg chip4"}):t._e(),i("v-tooltip",{attrs:{top:"","max-width":"400",color:t.steps[3].color},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,s=e.attrs;return[i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var n=e.hover;return[i("v-btn",t._g(t._b({staticClass:"rounded-lg",class:{"white--text":t.currentStep>2},attrs:{block:"",height:"64",elevation:n?8:0,outlined:!(t.currentStep>2),color:t.steps[3].color,disabled:t.currentStep<3},on:{click:function(e){t.editable&&t.addFactor(4)}}},"v-btn",s,!1),a),[t._v(" "+t._s(t.steps[3].title)+" ")])]}}],null,!0)})]}}])},[i("span",{domProps:{textContent:t._s(t.steps[3].content)}})])],1),t.editable?i("v-btn",{staticClass:"indicator-4",attrs:{fab:"",rounded:"",elevation:"0"},on:{click:function(e){t.currentStep>2&&t.setCurrentSlide(3)}}},[t._v("4")]):t._e(),i("div",{staticClass:"triangle-up"})],1)]),i("div",{staticClass:"w-2"}),i("div",{staticClass:"w-third flex flex-column justify-center di-r"},t._l(t.wildcards,(function(e,a){return i("div",{key:a,staticClass:"chip-wrap",class:[t.nodeClass(a,t.wildcardsLength)]},[i("v-chip",{staticClass:"tc rounded-lg",attrs:{label:"",link:"",color:t.steps[3].color,"text-color":"white"},on:{click:function(i){i.stopPropagation(),t.editable&&t.editFactor(e)}}},[t._v(t._s(e.title))])],1)})),0)])])])])]),i("v-dialog",{attrs:{persistent:"","max-width":"360"},model:{value:t.dialog,callback:function(e){t.dialog=e},expression:"dialog"}},[i("v-card",{attrs:{color:t.editedFactor.type?t.steps[t.editedFactor.type-1].color:null}},[i("v-card-title",{staticClass:"headline"}),i("v-card-text",[i("v-textarea",{attrs:{name:"input-7-1",label:t.editedFactor.label?t.editedFactor.label:null,rows:"3","hide-details":"",dark:""},model:{value:t.editedFactor.title,callback:function(e){t.$set(t.editedFactor,"title",e)},expression:"editedFactor.title"}})],1),i("v-card-actions",[t.editedFactor.id?i("v-menu",{attrs:{transition:"slide-y-transition",bottom:"",rounded:"lg"},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,s=e.attrs;return[i("v-btn",t._g(t._b({attrs:{color:"white",text:""}},"v-btn",s,!1),a),[t._v(" Usuń ")])]}}],null,!1,3497704063)},[i("v-list",{attrs:{dark:"",color:"red"}},[i("v-list-item",{on:{click:t.delFactor}},[i("v-list-item-title",[t._v("Potwierdzam usunięcie")])],1)],1)],1):t._e(),i("v-spacer"),i("v-btn",{attrs:{color:"white",text:""},on:{click:function(e){t.dialog=!1}}},[t._v(" Anuluj ")]),i("v-btn",{attrs:{color:"white",text:""},on:{click:t.insertFactor}},[t._v(" Zapisz ")])],1)],1)],1)],1)},$=[],I=(i("d81d"),{data:function(){return{dialog:!1,dialogKey:!1,keyFactorsSelection:[],dialogm1:"",editedFactor:{id:"",id_topic:"",title:"",ord:"",type:""}}},computed:Object(r["a"])(Object(r["a"])({},Object(l["c"])("scenarios",["id","currentStep","currentSlide","factorsByType","factors","factorsLength","keyFactors","forces","forcesLength","wildcards","wildcardsLength","keyFactorsLength","title","steps","editable","loading"])),{},{keyFactorsSelectionLength:function(){return this.keyFactorsSelection.length}}),watch:{dialogKey:function(t){t&&(this.keyFactorsSelection=this.keyFactors.map((function(t){return t.id})))}},methods:Object(r["a"])(Object(r["a"])(Object(r["a"])({},Object(l["b"])("scenarios",["getTopic","updateFactor","updateKeyFactors","deleteFactor"])),Object(l["d"])("scenarios",["setCurrentSlide"])),{},{nodeClass:function(t,e){return 0==t&&1==e?{"di-single":!0}:0==t?{"di-first":!0}:t==e-1?{"di-last":!0}:{"di-mid":!0}},addFactor:function(t){var e={1:"Dodaj czynnik",3:"Dodaj siłę napędową",4:"Dodaj wild card"};this.editedFactor={id:"",id_topic:this.id,title:"",type:t,key_factor:"0",ord:"0",label:e[t]},this.dialog=!0},editFactor:function(t){var e="Czynnik";this.editedFactor=Object(r["a"])({},t),this.editedFactor.label=e,this.dialog=!0},insertFactor:function(){var t=this;this.updateFactor(this.editedFactor).then((function(){return t.dialog=!1}))},delFactor:function(){var t=this;this.deleteFactor(this.editedFactor).then((function(){return t.dialog=!1}))},saveKeyFactors:function(){this.updateKeyFactors({id_topic:this.id,keyFactorsId:this.keyFactorsSelection}),this.dialogKey=!1},goToScenarios:function(){this.$router.push("/tematy/"+this.id+"/scenariusze")}})}),W=I,A=(i("ed12"),i("b0af")),H=i("99d9"),J=i("cc20"),G=i("ef9a"),Z=i("169a"),U=i("ce7e"),q=i("8860"),Q=i("da13"),R=i("5d23"),X=i("e449"),Y=i("490a"),tt=i("2fa4"),et=i("a844"),it=i("3a2f"),at=Object(p["a"])(W,N,$,!1,null,null,null),st=at.exports;v()(at,{VBtn:h["a"],VCard:A["a"],VCardActions:H["a"],VCardText:H["b"],VCardTitle:H["c"],VChip:J["a"],VChipGroup:G["a"],VDialog:Z["a"],VDivider:U["a"],VHover:y["a"],VList:q["a"],VListItem:Q["a"],VListItemTitle:R["a"],VMenu:X["a"],VProgressCircular:Y["a"],VSpacer:tt["a"],VTextarea:et["a"],VTooltip:it["a"]});var nt=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-100"},[i("section",[i("div",{staticClass:"section-wrap center ph3 w-100 w-90-l tc"},[i("h1",{staticClass:"c-dark fw7 mt6 mb5 f3 f2-m f1-l w-100 w-70-l lh-solid center"},[t._v(t._s(t.title))])])]),i("section",[i("div",{staticClass:"section-wrap center ph3 w-100 w-90-l f7 c-dark"},[t._m(0),i("div",{staticClass:"y-axis w-100"},[i("div",{staticClass:"w-100 flex flex-wrap min-h-scenario justify-center"},[i("div",{staticClass:"w-16-ns"}),i("scenario-card",{attrs:{id:t.id,nr:"1"}}),i("div",{staticClass:"w-axis arr-up relative"},[i("div",{staticClass:"y-label"},[t._v(" "+t._s(t.keyFactors[1].title)+" ")])]),i("scenario-card",{attrs:{id:t.id,nr:"2"}}),i("div",{staticClass:"w-16-ns"})],1),i("div",{staticClass:"w-100 flex flex-wrap h-axis x-axis"},[t._m(1),i("div",{staticClass:"w-30-ns flex items-end justify-center x-label"},[t._v(" "+t._s(t.keyFactors[0].title)+" ")]),i("div",{staticClass:"w-axis"}),i("div",{staticClass:"w-30-ns arr-right relative flex items-start justify-center x-label"},[t._v(" "+t._s(t.keyFactors[0].title)+" ")]),t._m(2)]),i("div",{staticClass:"w-100 flex flex-wrap min-h-scenario justify-center"},[i("div",{staticClass:"w-16-ns"}),i("scenario-card",{attrs:{id:t.id,nr:"3"}}),i("div",{staticClass:"w-axis relative"},[i("div",{staticClass:"y-label label-bottom flex items-end justify-center f7"},[t._v(" "+t._s(t.keyFactors[1].title)+" ")])]),i("scenario-card",{attrs:{id:t.id,nr:"4"}}),i("div",{staticClass:"w-16-ns"})],1)]),t._m(3)])])])},rt=[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-100 tc pt2 pb4"},[t._v(" Wysokie oddziaływanie,"),i("br"),t._v("tendencja wzrostowa ")])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-16-ns flex items-center justify-center"},[i("div",{staticClass:"tc"},[t._v("Niskie oddziaływanie,"),i("br"),t._v("tendencja spadkowa")])])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-16-ns flex items-center justify-center"},[i("div",{staticClass:"tc"},[t._v("Wysokie oddziaływanie,"),i("br"),t._v("tendencja wzrostowa")])])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-100 tc pv4"},[t._v(" Niskie oddziaływanie,"),i("br"),t._v("tendencja spadkowa ")])}],ct=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-hover",{scopedSlots:t._u([{key:"default",fn:function(e){var a=e.hover;return[i("v-card",{staticClass:"w-30-ns scenario-card rounded-lg relative",attrs:{elevation:a?10:0,color:t.scenario.title?t.scenarioColors[t.nr]:"#EBEBEB",to:"/tematy/"+t.id+"/scenariusze/"+t.nr}},[t.pulse?i("div",{staticClass:"pulse-bg bg-mid"}):t._e(),i("div",{staticClass:"card-wrap pa6 lh-solid"},[t.scenario.title?i("div",{staticClass:"f4 fw7 lh-title tc white--text f-www"},[t._v(t._s(t.scenario.title))]):i("div",{staticClass:"f3 fw7 tc c-light"},[t._v("Scenariusz "+t._s(t.nr))])])])]}}])})},ot=[],lt={name:"ScenarioCard",props:["id","nr"],data:function(){return{scenarioColors:{1:"#DB2E89",2:"#A5005C",3:"#FF68B9",4:"#DB2E89"}}},computed:Object(r["a"])(Object(r["a"])({},Object(l["c"])("scenarios",["scenarioByNr","loading"])),{},{scenario:function(){return this.scenarioByNr(this.nr)},pulse:function(){return 1==this.nr&&!this.scenario.title||(!(2!=this.nr||this.scenario.title||!this.scenarioByNr(1).title)||(!(3!=this.nr||this.scenario.title||!this.scenarioByNr(1).title||!this.scenarioByNr(2).title)||!(4!=this.nr||this.scenario.title||!this.scenarioByNr(1).title||!this.scenarioByNr(2).title||!this.scenarioByNr(3).title)))}})},dt=lt,ut=(i("e029"),Object(p["a"])(dt,ct,ot,!1,null,null,null)),pt=ut.exports;v()(ut,{VCard:A["a"],VHover:y["a"]});var ft={props:["id"],components:{ScenarioCard:pt},data:function(){return{currentStep:5}},computed:Object(r["a"])({},Object(l["c"])("scenarios",["factorsByType","keyFactors","title","steps","loading"])),mounted:function(){this.setCurrentSlide(5)},methods:Object(r["a"])({},Object(l["d"])("scenarios",["setCurrentSlide"]))},vt=ft,ht=(i("9703"),Object(p["a"])(vt,nt,rt,!1,null,null,null)),wt=ht.exports,bt=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"w-100"},[i("section",{staticClass:"section-wrap center ph3 w-100 w-90-l mt6 mb6"},[t.editable?i("input",{directives:[{name:"model",rawName:"v-model",value:t.scenarioTitle,expression:"scenarioTitle"}],staticClass:"w-100 tc f2 f1-l discrete c-dark fw7",attrs:{type:"text",placeholder:"Nazwa scenariusza"},domProps:{value:t.scenarioTitle},on:{blur:t.saveScenario,input:function(e){e.target.composing||(t.scenarioTitle=e.target.value)}}}):i("h1",{staticClass:"tc c-dark f2 f1-l"},[t._v(t._s(t.scenarioTitle?t.scenarioTitle:"Scenariusz "+t.nr))])]),i("section",{staticClass:"section-wrap center ph3 w-100 w-90-l mb3 flex justify-center"},[i("div",{staticClass:"ph3 w-50"},[i("h5",{staticClass:"c-dark mb4 fw7 f5"},[t._v("Czynniki kluczowe")]),i("div",{staticClass:"flex"},[i("div",{staticClass:"pr2"},[i("v-chip",{staticClass:"mb3 rounded-lg chip2 h36",attrs:{label:""}},[t._v(" "+t._s(t.keyFactors[0].title)+" ")]),i("div",{staticClass:"mt2 f5",domProps:{innerHTML:t._s(t.axisLegend.x)}})],1),i("div",{staticClass:"pl2"},[i("v-chip",{staticClass:"mb3 rounded-lg chip2 h36",attrs:{label:""}},[t._v(" "+t._s(t.keyFactors[1].title)+" ")]),i("div",{staticClass:"mt2 f5",domProps:{innerHTML:t._s(t.axisLegend.y)}})],1)])]),i("div",{staticClass:"ph3"},[t.selectedFactors.length>0?i("h5",{staticClass:"c-dark mb4 fw7 f5"},[t._v("Siły napędowe, trendy")]):i("div",{staticClass:"w-100 h2"}),t._l(t.selectedFactors,(function(e,a){return i("v-chip",{key:a,staticClass:"mr2 mb2 rounded-lg h36",class:t.chipClass(e.type),attrs:{label:""}},[t._v(" "+t._s(e.title)+" ")])})),t.editable?i("div",{staticClass:"w-100 mt3"},[i("v-dialog",{attrs:{scrollable:"",persistent:"","max-width":"600px"},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,s=e.attrs;return[i("v-btn",t._g(t._b({staticClass:"rounded-lg",attrs:{text:"",color:"primary"}},"v-btn",s,!1),a),[i("v-icon",{attrs:{left:""}},[t._v(" mdi-plus ")]),t._v("Siły, trendy ")],1)]}}],null,!1,3668709413),model:{value:t.dialogKey,callback:function(e){t.dialogKey=e},expression:"dialogKey"}},[i("v-card",[i("v-card-title",[t._v("Czynniki wpływające na scenariusz")]),i("v-divider"),i("v-card-text",{staticClass:"mt3"},[i("h2",{staticClass:"f5 mb-2"},[t._v(" Czynniki zmian ")]),i("v-chip-group",{attrs:{column:"",multiple:"","active-class":"chip1"},model:{value:t.scenarioFactorsEdit,callback:function(e){t.scenarioFactorsEdit=e},expression:"scenarioFactorsEdit"}},t._l(t.factors,(function(e,a){return i("v-chip",{key:a,staticClass:"rounded-lg",attrs:{filter:"",label:"",value:e.id}},[t._v(" "+t._s(e.title)+" ")])})),1)],1),i("v-card-text",[i("h2",{staticClass:"f5 mb-2"},[t._v(" Siły napędowe ")]),i("v-chip-group",{attrs:{column:"",multiple:"","active-class":"chip3"},model:{value:t.scenarioFactorsEdit,callback:function(e){t.scenarioFactorsEdit=e},expression:"scenarioFactorsEdit"}},t._l(t.forces,(function(e,a){return i("v-chip",{key:a,staticClass:"rounded-lg",attrs:{filter:"",label:"",value:e.id}},[t._v(" "+t._s(e.title)+" ")])})),1)],1),i("v-card-text",[i("h2",{staticClass:"f5 mb-2"},[t._v(" Wild cards ")]),i("v-chip-group",{attrs:{column:"",multiple:"","active-class":"chip4"},model:{value:t.scenarioFactorsEdit,callback:function(e){t.scenarioFactorsEdit=e},expression:"scenarioFactorsEdit"}},t._l(t.wildcards,(function(e,a){return i("v-chip",{key:a,staticClass:"rounded-lg",attrs:{filter:"",label:"",value:e.id}},[t._v(" "+t._s(e.title)+" ")])})),1)],1),i("v-divider"),i("v-card-actions",[i("v-spacer"),i("v-btn",{attrs:{text:"",color:"secondary"},on:{click:function(e){t.dialogKey=!1}}},[t._v(" Anuluj ")]),i("v-btn",{attrs:{text:"",color:"primary"},on:{click:t.saveScenarioFactors}},[t._v(" Zapisz ")])],1)],1)],1)],1):t._e()],2)]),i("section",{staticClass:"section-wrap center ph3 w-100 w-90-l"},[i("div",{staticClass:"w-100 w-80-m w-75-l center mb6 mt6 f5"},[t.editable?i("editor",{attrs:{"api-key":"no-api-key",language:"pl","cloud-channel":"5",disabled:!1,id:"uuid",init:{menubar:!1},"model-events":"",placeholder:"Wnioski, działania jakie należy podjąć w przypadku realizacji scenariusza",inline:!0,plugins:"lists link","tag-name":"div",toolbar:"undo redo | h1 h2 h3 | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link ",value:t.scenarioContent,min_height:"100",inline_styles:!1},on:{onBlur:t.saveScenario},model:{value:t.scenarioContent,callback:function(e){t.scenarioContent=e},expression:"scenarioContent"}}):i("div",{staticClass:"fw5 f-www",domProps:{innerHTML:t._s(t.scenarioContent)}})],1)])])},yt=[],mt=i("ca72"),Ct={props:["id","nr"],components:{editor:mt["a"]},data:function(){return{scenarioTitle:"",scenarioContent:"",scenarioFactors:[],axisLabelMin:"Niskie oddziaływanie,<br />tendencja spadkowa",axisLabelMax:"Wysokie oddziaływanie,<br />tendencja wzrostowa",dialogKey:!1,scenarioFactorsEdit:[]}},computed:Object(r["a"])(Object(r["a"])({},Object(l["c"])("scenarios",["factorsByType","steps","notKeyFactors","keyFactors","findFactorsMultiple","title","scenarioByNr","editable","loading"])),{},{scenario:function(){return this.scenarioByNr(this.nr)},factors:function(){return this.notKeyFactors},factorsLength:function(){return this.factors.length},keyFactorsLength:function(){return this.keyFactors.length},forces:function(){return this.factorsByType(3)},forcesLength:function(){return this.forces.length},wildcards:function(){return this.factorsByType(4)},wildcardsLength:function(){return this.wildcards.length},selectedFactors:function(){return this.findFactorsMultiple(this.scenarioFactors)},axisLegend:function(){return 1==this.nr?{x:this.axisLabelMin,y:this.axisLabelMax}:2==this.nr?{x:this.axisLabelMax,y:this.axisLabelMax}:3==this.nr?{x:this.axisLabelMin,y:this.axisLabelMin}:{x:this.axisLabelMax,y:this.axisLabelMin}}}),created:function(){this.scenarioTitle=this.scenario.title,this.scenarioContent=this.scenario.content,this.scenarioFactors=this.scenarioFactorsEdit=this.scenario.factors?JSON.parse(this.scenario.factors):[]},mounted:function(){this.setCurrentSlide(6)},methods:Object(r["a"])(Object(r["a"])(Object(r["a"])({},Object(l["b"])("scenarios",["updateScenario"])),Object(l["d"])("scenarios",["setCurrentSlide"])),{},{saveScenario:function(){this.updateScenario({id_topic:this.id,id:this.scenario.id?this.scenario.id:"",ord:this.nr,title:this.scenarioTitle,content:this.scenarioContent,factors:JSON.stringify(this.scenarioFactors)})},saveScenarioFactors:function(){this.scenarioFactors=this.scenarioFactorsEdit,this.saveScenario(),this.dialogKey=!1},chipClass:function(t){return{chip1:1==t,chip2:2==t,chip3:3==t,chip4:4==t}}})},gt=Ct,_t=(i("276e"),Object(p["a"])(gt,bt,yt,!1,null,null,null)),kt=_t.exports;v()(_t,{VBtn:h["a"],VCard:A["a"],VCardActions:H["a"],VCardText:H["b"],VCardTitle:H["c"],VChip:J["a"],VChipGroup:G["a"],VDialog:Z["a"],VDivider:U["a"],VIcon:m["a"],VSpacer:tt["a"]}),a["a"].use(K["a"]);var xt=[{path:"/tematy/:id",name:"Diagram",component:st,props:!0},{path:"/tematy/:id/scenariusze",name:"Scenariusze",component:wt,props:!0},{path:"/tematy/:id/scenariusze/:nr",name:"Scenariusz",component:kt,props:!0}],St=new K["a"]({mode:"history",routes:xt}),jt=St;i("845f"),i("3788");a["a"].config.productionTip=!1,new a["a"]({store:E,vuetify:M,router:jt,render:function(t){return t(j)}}).$mount("#app")},7364:function(t,e,i){},"845f":function(t,e,i){},"85ec":function(t,e,i){},9703:function(t,e,i){"use strict";i("40a2")},e029:function(t,e,i){"use strict";i("7364")},ed12:function(t,e,i){"use strict";i("0b1c")}});
//# sourceMappingURL=app.dd71e69d.js.map