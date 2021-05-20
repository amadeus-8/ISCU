require('./bootstrap')
import 'bootstrap/dist/js/bootstrap.bundle.min'
import {createApp} from 'vue'
import router from './routes/router'
import store from './vuex/store'
import App from './components/App'
import {initialize} from './helpers/general'

initialize(store)

createApp(App).use(store).use(router).mount('#app')

window.store = store
