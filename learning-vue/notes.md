<!-- Created at: 23 dec 2018 -->

## List of terms extracted from the documentation or other resources

---

### v- prefix for directives

 v-bind:title="message" : {
    keep this element's title attribute up to date with the message property on the Vue instance
}

---

v-on : let user interact with your app
attach event listeners that invoke methods on our Vue instances


---

<b>v-model</b>

1. 2 way binding
2. binds the value (:value) 
3. it gives us the @input event(@change if used with lazy)

---

component = essentially a Vue instance with pre-defined options

---

Root Instance
└─ TodoList
   ├─ TodoItem
   │  ├─ DeleteTodoButton
   │  └─ EditTodoButton
   └─ TodoListFooter
      ├─ ClearTodosButton
      └─ TodoListStatistics

---

### Vue instance

When a Vue Instance is created, it adds all the props found in 
its "data" obj to "Vue's reactivity system"
When the values of those props change, the view will "react", updating to match 
the new values

props in "data" are only reactive if they existed when the instance was created
Vue's instance properties and methods : prefixed with $

4 steps 
1. set up data observation,
2. compile the template,
3. mount the instance to the DOM,
4. update the DOM when data changes


---

lifecycle hooks - give users the opportunity to add their own code at specific stages

all lifecycles hooks are called with their this context

---

v-once :  do not update on data change

---

v-bind : add attributes

---

you should not attempt to access user-defined globals in template expressions

---

### Directives

prefixed by v-

its job is to reactively apply side effects to the DOM when the value of its expr changes

some directives can take an argument, denoted by a colon after the directive name
v-bind - used to reactively update an html attribute

---

### Computerd Properties and Watchers

computed properties are cached based on their dependencies
computed prop - will only re-evaluate when some of its dependencies have changed

method -  will always run the function whenever a re-render happens

#### Computed vs Watched

when you have data that needs to change based on some other data: use watch
however, it is ofter a better idea to use computed properties

#### Watchers

useful when you want to perfom asynchronous or expensive operations in respons to changing data

---

### Controlling Reusable Elements

key attr - unique values; don't reuse them
when Vue is updating a list of elements rendered with v-for, by default it uses an in-place patch strategy
if the order has changed, instead of moving the DOM elems to match the order of items
Vue will patch each element in-place and make sure it reflects what should be rendered at that particular index
suitable when ur list render output does not rely on child componenent state or temporary DOM state(e.g form input value)
<br>
to track each node's identity, and thus reuse and reorder existing elements, you need to provide an unique key





----

v-show -  the element will always be rendered and remain in the DOM;
             -  only toggles the display CSS property of the element
             - higher render costs
             - recommended if you need to toggle something very often

v-if - it ensures that event listeners and child componentes inside the conditional block are properly destroyed and re-created during toggles
            - lazy : if the condition is false on initial render, it will not do anything
            - higher toggle costs
<br>
<br>

v-for has a higher priority than v-if ===> v-if will run on each iteration of the loop separately

---

components have isolated scopes of their own. To pass data into the component, use props

---

### Event Handlers

$event - when you need to access the original DOM event in an inline statement handler


#### Key modifiers

1. .enter
2. .tab
3. .delete
4. .esc
5. .space
6. up. ...
<br>
You can also define custom key modifier aliases : Vue.config.keyCodes.f1 = 112

---

### Components

* a property must be present in the data object in order for Vue to convert it and make it reactive 

* are reusable Vue instances with a name - they accept the same options as new Vue: data, computed, watch, methods and lifecycle hooks

* we can use a component as a custom element inside a root Vue instance creted with new Vue()

* each time you use a component, a new instance is created
<br>
<br>

data -  must be a function so that each instance can maintain an independent copy of the returned data object

<br>

* 2 types of component inregistration : global(using Vue.component()) and local

the styles will be applied for the data passed from outside

<br> 


#### Passing Data to Child Components


props - custom attributes you can register on a component; when a value is passed to a prop attr, it becomes a property of that component instance
            - preferred for passing information to a child component

#### Local Registration

In Webpack, globally registering all components means that even if you stop using a component, it could still be included in ur final buid: 
unnecessarily increases the amount of JS the users have to download

<br>
Make component A be available in component B

javascript

var ComponentA = { /* ... */ }

var ComponentB = {
  components: {
    'component-a': ComponentA
  },
  // ...
}


<br>

HTML attribute names are case-insensitive.

<br>


#### Passing Properties of an Object


If you want to pass all the properties: v-bind(without and argument)

javascript
post: {
  id: 1,
  title: 'My Journey with Vue'
}


Will be equivalent to:

javascript
<blog-post
  v-bind:id="post.id"
  v-bind:title="post.title"
></blog-post>


<br>

base components components that wrap an element like an input or a button

### One-Way Data Flow

When the parent property updates, it will flow down to the child, but not the other way around

This prevents child comp from accidentally mutating the parent's state

Every time the parent comp is updated, all props in the child comp will be refreshed with the latest value

<br>

Mutating prop inside a child comp:

<p> 1: The prop is used to pass an initial value; the child component wants to use it as a local data property afterwards

javascript
props: ['initialCounter'],
data: function () {
  return  {
    counter: this.initialCounter
  }
}

</p>

<p> The prop is passed in as a rau value that needs to be transformed

javascript
props: ['size'],
computed: {
  normalizedSize: function () {
    return this.size.trim().toLowerCase();
  }
}

</p>

props are validated before a component instance is created, so instance properties (data, computed) will not be available inside default or validator

<br>

#### Non-Prop Attributes

an attribute that is passed to a component, but does not have a corresponding prop defined

#### Replacing/Merging with Existing Attributes

class and style are merged
other attributes like type(on input) would be replaced


#### Disabling Attribute Inheritance

attributes from parent scope that are not recognized as props, will be applied to the root element of the child component as normal HTML attrs

javascript
Vue.component('my-component', {
  inheritAttrs: false,
  // ...
})


$attrs - contains the attribute names and values passed to a component
             - contains parent-scope attributes(except for class and style) that are not recognized(and extracted) as props.
               when a component doesn't have any declared props, this essentially contains all parent-scope bindings(except for class and style) and can be passed down to an inner component via v-bind="$attrs"



$listeners - property containing an object of listeners being used on the component

$el -  the HTML element managed by the Vue instance; could also keep the compiled template

$data - holds the data of the Vue Instance

ref="name" - register an element; not reactive, not part of Vue instance

vm.$mount() - if a Vue instance does not have an 'el' prop, you can use that in order to attach the element for the instance 

---

### Vue Instance Lifecycle

<pre>
new Vue() --> <br>
          beforeCreate() --> <br>
              Init Data & Events  --> <br>
                  Instance Created(<b>created()</b>) { Compile Template or **el**'s template } --> <br>
                      beforeMount() { before being mounted to the real DOM} --> <br>
                          replace **el** with compiled template --> <br>
                              Mounted to the DOM --> Lifecycle {
                                Data changed -->
                                  beforeUpdate() -->
                                    <b>Re-render DOM</b>
                                    updated() --> 
                                      <b>Mounted DOM</b>
                              } -->
                                beforeDestroy() -->
                                  Destroyed

</pre>


--- 

* Vue will treat the unnamed slots as default slots

* Dynamically add components: ```<component></component>```

* By default, dynamic components get destroyed

* ```<keep-alive></keep-alive>``` - keep alive dynamic components

---

### Input modifiers

```v-model.lazy``` - listen on change event
```v-model``` - listen on key event

---

### Directives

```Globally``` - Vue.directive() in ```main.js```

* A directive has 5 Hooks <br>
  1. ``` bind(el, binding, vnode) ``` - occurs as soon as the directive is bound to the element
  2. ``` inserted(el, binding, vnode) ``` - as soon as inserted in the dom
  3. ``` update(el, binding, vnode, oldVnode) ``` - whenever the comp gets updated (Without Children)
  4. ``` componentUpdated(el, binding, vnode) ``` - whenever the comp gets updated(With Children)
  5. ``` unbind(el, binding, vnode) ``` - once the directive is removed

```modifiers``` - v-myDirectiv.nameOfModifier="{key1:val1, key2:val2...}"; binding.modifier['nameOfModifier']

```arguments``` v-myDirective:argument; binding.arg


### Filters & Mixins

```filter``` - feature you can use to transform output

```mixins``` - when you want to share code or functionality among multiple components

```mixins``` - can be merged; components always get called last


### Transition CSS Classes

```*-enter``` - the first frame

```*-enter-active``` - until the animation finishes

```*-leave``` 

```*-enter-leave```

<b>Default</b> : ```v-enter``` if no name is supplied

```type``` - dictates the length

```mode="out-in"``` - let the old element animate out first, and then animate the new one

---

#### Transition JS Hooks

1. ```before-enter``` - comparable with "*-enter" css class which lasts for one frame; set the initial state

2. ```enter ```- play our animation; 

3. ```after-enter``` - after our animation is finished

4. ```after-enter-cancelled``` - "change the condition which will add  to the element before the animation finished"

5. ```before-leave```

6.```leave```

7. ```after-leave```

8. ```after-leave-cancelled```

```! IMPORTANT ! ```  <br>
  1.  ```<transition>``` - will not be rendered in the DOM
  2. ```<transition-group tag="TAG">``` - does render a new HTML Tag!(span by default); 

<p><b>You can use all these hooks</b> on you CSS animation.</p>

<p>For example, you could execute some code whenever some animation finishes executing</p>

```:css="false"``` -  don't look for CSS classes

<p>
<b>Where to animate with JavaScript ? </b> 
<br>
In <code>enter</code> and <code>leave</code> hooks, because these are the functions that get executed after setting the intial state(<code>beforeLeave</code>, <code>afterLeave</code>) and before we are done(<code>after-enter</code>, <code>after-leave</code>)
</p>

---

### Event Bus

<b>Allows us to emit an event in one component and listen for that in another</b>

<p>
  <b><li>Defining a global Event Bus</li></b>
  <p>In this way you won't have to export the event bus in each components
    <br>
    <code>
      Vue.prototype.$eventHug  = new Vue();
    </code>
  </p>
  <p>
  From any components, you can emit an event to the bus as follows: 
  <br>
  <code>
    login() {
      this.$eventHub.$emit('logged-in')
    }
  </code>
  </p>
  <p>
    In order to listen to events, the event bus must be put in <code>created()</code>
    <br>
    <code>
      created() {
        this.$eventHub.$on('logged-in', this.getCurrentUser);
      }
      <br>
      // Make sure the event listener is turned off before you destroy the component 
      <br>
      beforeDestroy() {
        this.$eventHub.$off('logged-in')
      }
    </code>
  </p>
</p>


---


### Routing

* what's before the `#` - is sent to the server

* what's after the `#` - handed over to the JS application

### render() 

* here we can create the DOM(Virtual DOM); contains Vnodes

* declarative template is compiled to imperative render function

* alternative: write render function directly

* functional component - Vue doesn't have to watch for any change
