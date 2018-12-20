import React from "react";
import { View, 
        TouchableOpacity,
        Text,
        SafeAreaView } from "react-native";
import { Card, Button, FormLabel, FormInput } from "react-native-elements";
import Spinner from 'react-native-loading-spinner-overlay';
import { connect } from 'react-redux';

import Constant from '../Utils/Constant'
import {saveAsyncStorage} from '../Utils/Helpers'

import {login} from '../Utils/Services'

import * as actions from '../Actions'

import {LOADING} from '../Actions/types'

// export default ({navigation}) =>
class SignIn extends React.Component{
  constructor(props){
    super(props)

    this.state={
      loading: false,
      email:'',
      password:''
    }
  }

  /*
   // login("admin", "1234").then(data => {
    //   console.log('Print list of movies:', data);
    // })
   */

  onLogin(){
    // console.log('email : ' + this.state.email + " , password : " + this.state.password)

    if(this.state.email === '' && this.state.password === ''){
      alert("Email and Password is empty.")
    }else if(this.state.email === ''){
      alert("Email is empty.")
    }else if(this.state.password === ''){
      alert("Password is empty.")
    }else{

      /*
      this.setState({loading:true})
      login(this.state.email, this.state.password).then(data => {
        this.setState({isShowSpinner:false})
        if((data instanceof Array)){
          // error message
          alert(data[0])
          return;
        }else{
          // console.log(data)
          if(!data.result){
            alert(data.message)
          }else{

            // console.log(data.data.friend_profiles)
            // console.log(data.data.user)
            // console.log(data.data.user_profile)

            saveAsyncStorage(Constant.USER_LOGIN, {"provider": Constant.PROVIDERS.EMAIL}).then((v)=>{
              if(v.status){
                this.props.navigation.navigate("Main") 
              }
            }).catch((error)=>{
              console.log(error)
            })
          }
        }
      })
      */

      this.setState({loading:true})
      this.props.actionLogin({email:this.state.email, password:this.state.password}).then((result) => {
        console.log(result)

        this.setState({loading:false})
        if(result.status){
          this.props.navigation.navigate("App") 
        }else{

        }
      })
    }
  }

  render(){
    let {navigation, isLogin} = this.props

    // if(isLogin){
    //   navigation.navigate("Main")
    // }

    return (
    <SafeAreaView style={{flex:1}}>
    <View style={{ flex:1, paddingVertical: 20, backgroundColor:'white' }}>
      {/* <Card title="SIGN IN"> */}

        <Spinner
          visible={this.state.loading}
          textContent={'Loading...'}
          textStyle={{color: '#FFF'}}
          overlayColor={'rgba(0,0,0,0.5)'}
        />
        <FormLabel>Email</FormLabel>
        <FormInput 
          placeholder="email..." 
          ref= {(el) => { this.email = el; }}
          onChangeText={(email) => this.setState({email})}
          value={this.state.email}/>
        <FormLabel>Password</FormLabel>
        <FormInput 
          secureTextEntry 
          placeholder="password..." 
          ref= {(el) => { this.password = el; }}
          onChangeText={(password) => this.setState({password})}
          value={this.state.password}/>

        {/* <Button
          buttonStyle={{ marginTop: 20 }}
          backgroundColor="#03A9F4"
          title="SIGN IN"
          onPress={() => {
            saveDataLocal(Constant.USER_LOGIN, {"provider": Constant.PROVIDERS.EMAIL}).then((data)=>{
              if(data.status){
                navigation.navigate("Main")
              }
            }).catch((error)=>{
              console.log(error)
            })
          }}
        /> */}

        <View style={{padding:10}}>
          <TouchableOpacity
            style={{backgroundColor:'#03A9F4', padding: 10, alignItems:'center'}}
            onPress={() => {
              this.onLogin()
              /*
              saveDataLocal(Constant.USER_LOGIN, {"provider": Constant.PROVIDERS.EMAIL}).then((data)=>{
                if(data.status){
                  navigation.navigate("Main")
                }
              }).catch((error)=>{
                console.log(error)
              })
              */
            }}>
            <Text style={{color:'white', fontSize: 18, fontWeight:'700'}}>SIGN IN</Text>
          </TouchableOpacity>
        </View>

        <View style={{padding:10}}>
          <TouchableOpacity
            style={{backgroundColor:'gray', padding: 10, alignItems:'center'}}
            onPress={() => {
              navigation.navigate('SignUp')
            }}>
            <Text style={{color:'white', fontSize: 18, fontWeight:'700'}}>SIGN UP</Text>
          </TouchableOpacity>
        </View>
      {/* </Card> */}

        <View style={{position:'absolute', bottom: 0, right: 0, padding:10, alignItems:'flex-end'}}>
          <TouchableOpacity
            // style={{backgroundColor:'gray', padding: 10, alignItems:'center'}}
            onPress={() => {
              navigation.navigate('ForgotPassword')
            }}>
            <Text style={{color:'black', fontSize: 18}}>Forgot Password</Text>
          </TouchableOpacity>
        </View>
    </View>
    </SafeAreaView>)
  }
}

const mapStateToProps = (state) => {
  // console.log(state)
  return({
      loading:state.auth.loading,
      isLogin:state.auth.isLogin
  })
}

export default connect(mapStateToProps, actions)(SignIn)