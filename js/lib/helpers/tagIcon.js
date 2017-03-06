export default function tagIcon(tag, attrs = {}) {
  attrs.className = 'icon TagIcon ' + (attrs.className || '');

  if (tag) {
     attrs.style = attrs.style || {};
    
    if(tag.backgroundUrl()){
    	attrs.className = 'Button-icon icon fa fa-fw ' + tag.backgroundUrl();
      attrs.style.fontSize = '20px';
    	attrs.style.color = tag.color();

    } else {
    	attrs.style.backgroundColor = tag.color() ;
    }
   console.log(attrs)
  } else {
    attrs.className += ' untagged';
  }

  return <span {...attrs}></span>;
}
