import { Router, response } from 'express';
import { request } from 'http';

export const routerUser = Router();

routerUser.get('/', (request, response) => response.send('Serviços de usuário'));