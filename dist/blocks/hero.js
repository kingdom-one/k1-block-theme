!function(){"use strict";var e=window.wp.element,t=window.wp.blocks,r=window.wp.blockEditor;(0,t.registerBlockType)("k1-block-theme/hero",{title:"Hero Section",edit:function(){return(0,e.createElement)("section",{className:"hero d-flex flex-column justify-content-center",id:"hero"},(0,e.createElement)("div",{className:"hero__background"},(0,e.createElement)("div",{className:"hero__background--lower",style:{backgroundColor:"var(--color-primary--dark)"}})),(0,e.createElement)(r.InnerBlocks,{allowedBlocks:["k1-block-theme/hero-content"]}))},save:function(){return(0,e.createElement)("section",{className:"hero d-flex flex-column justify-content-center",id:"hero"},(0,e.createElement)("div",{className:"hero__background"},(0,e.createElement)("div",{className:"hero__background--lower",style:{backgroundColor:"var(--color-primary--dark)"}})),(0,e.createElement)(r.InnerBlocks.Content,null))},supports:{align:["full"]},attributes:{type:"string",default:"full"},category:"theme"})}();