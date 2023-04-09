import { UserController } from './../controller/UserControler';
import { Router, response } from 'express';
import { request } from 'http';
import { User } from '../entity/User';

export const routerUser = Router();
const userController = new UserController();


routerUser.post('/', userController.save);
