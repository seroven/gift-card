import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
import beforeEachGuard from '../guards/beforeEachGuard';

const router =  createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(beforeEachGuard);


export default router;