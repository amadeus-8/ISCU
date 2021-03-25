require('./bootstrap')
import {createApp} from 'vue'
import router from './routes/router'
import store from './vuex/store'
import App from './components/App'

createApp(App).use(store).use(router).mount('#app')

window.store = store
