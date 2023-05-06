import { Request } from 'express';

export interface IUserController {

    save(request: Request): any;
    getAll(request: Request): any;
    getById(request: Request): any;
    deleteById(request: Request): any;
    updateById(request: Request): any;

}