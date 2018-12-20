import { FOREGROUND, BACKGROUND, INACTIVE } from 'redux-enhancer-react-native-appstate';

import {LOGIN_USER_SUCCESS,
        LOGIN_USER_FAIL}  from '../Actions/types'

const INITIAL_STATE = {user:null,
                       provider:'',
                       isLogin: false,
                       }

export default (state= INITIAL_STATE, action)=>{
    // console.log(action)
    switch(action.type){
        // case EMAIL_CHANGED:{
        //     return { ...state, email: action.payload };
        // }
        // case PASSWORD_CHANGED:{
        //     return { ...state, password: action.payload}
        // }
        case LOGIN_USER_SUCCESS:{
            return {...state, 
                    user: action.user, 
                    provider: action.provider,
                    isLogin: true,
                    }
        } 
        case LOGIN_USER_FAIL:{
            return {...state,
                    provider: action.provider,
                    isLogin: false}
        }
        
        default:
            return state
    }
}